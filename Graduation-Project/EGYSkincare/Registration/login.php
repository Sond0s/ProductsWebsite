<?php
require 'config.php';

// fetch data from login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Retrieve hashed password from database
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$username'");
    $row = mysqli_fetch_assoc($result);
    
    if (mysqli_num_rows($result) > 0) {
        // Verify hashed password
        if (password_verify($password, $row["password"])) {
            session_start();
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: ../index.php");
            exit;
        } else {
            echo "<script>alert('Wrong Password');</script>";
        }
    } else {
        echo "<script>alert('User Is Not Registered');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Css file link -->
    <link rel="stylesheet" href="../HTML Template/style.css">
    <style>
        body {
            background: linear-gradient(60deg, #00224D, #535C91);
            background-size: cover;
            height: 100vh;

        }

        .login-container {
            max-width: 500px;
            margin: auto;
            margin-top: 100px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        .forget a {
            text-decoration: none;
            color: #00224D;
            /* Remove underline */
        }

        .forget a:hover {
            color: #535C99;
            /* Change link color on hover */
        }
    </style>
</head>

<body>
    <div class="container font-rubik">
        <div class="login-container">
            <h2 class="text-center mb-4 color-second">Log In</h2>
            <form id="loginForm" method="post" action="../index.php" autocomplete="off">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn color-second-bg btn-block text-white">Log In</button>
            </form>
            <div class="color-primary forget ">
                <div class="text-center mt-3">
                    <a href="signup.php">Sign up </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>