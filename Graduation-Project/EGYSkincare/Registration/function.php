<?php
require "config.php";

// starting functions to connect with db
function connect()
{
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
    if ($mysqli->connect_errno != 0) {
        $error = $mysqli->connect_error;
        $error_date = date("F j , Y, g:i a");
        $message = "{$error} | {$error_date} \r \n";
        file_put_contents("db-log.txt", $message, FILE_APPEND);
        return false;
    } else {
        return $mysqli;
    }
}

// signup user
function registerUser($email, $username, $password, $confirm_password)
{
    $mysqli = connect();
    
    // Check if connection to database failed
    if ($mysqli === false) {
        return "An error occurred. Please try again later.";
    }

    // Trim input values
    $args = array_map('trim', func_get_args());

    // Check for empty fields
    if (in_array('', $args)) {
        return "All fields are required";
    }

    // Check for valid characters in username
    if (preg_match("/[<|>] /", $username)) {
        return "Invalid characters in username";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email is not valid";
    }

    // Search for existing email
    $stmt = $mysqli->prepare("SELECT email FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return "Email already exists. Please use a different email";
    }

    // Check username length
    if (strlen($username) > 50) {
        return "Username is too long";
    }

    // Search for existing username
    $stmt = $mysqli->prepare("SELECT username FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return "Username already exists. Please use a different username";
    }

    // Check password length
    if (strlen($password) > 50) {
        return "Password is too long";
    }

    // Check password & confirm password matching
    if ($password != $confirm_password) {
        return "Passwords do not match";
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $stmt = $mysqli->prepare("INSERT INTO user (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $email);
    if ($stmt->execute()) {
        header("Location: ../index.php");
        return "success";
    } else {
        return "An error occurred. Please try again";
    }
}


// login user
function loginUser()
{
}

// logout user
function logoutUser()
{
}
