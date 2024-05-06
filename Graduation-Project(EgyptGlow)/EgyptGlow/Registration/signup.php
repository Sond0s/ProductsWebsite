<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="error-text">
                    <?php
                    if (isset($_POST["submit"])) {
                        $username = $_POST["username"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $confirm_password = $_POST["confirm_password"];
                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                        $errors = array();
                        if (empty($username) or empty($email) or empty($password) or empty($confirm_password)) {
                            array_push($errors, "All fields are required");
                        }
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            array_push($errors, "Email is not valid");
                        }
                        if (strlen($password) < 8) {
                            array_push($errors, "Password must be at least 8 charactes long");
                        }
                        if ($password !== $confirm_password) {
                            array_push($errors, "Password does not match");
                        }
                        require_once "dbconnect.php";
                        $sql = "SELECT * FROM user WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        if ($rowCount > 0) {
                            array_push($errors, "Email already exists!");
                        }
                        if (count($errors) > 0) {
                            foreach ($errors as  $error) {
                                echo "$error<br/>";
                            }
                        } else {
                            $sql = "INSERT INTO user (username, email, password) VALUES ( ?, ?, ? )";
                            $stmt = mysqli_stmt_init($conn);
                            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                            if ($prepareStmt) {
                                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passwordHash);
                                mysqli_stmt_execute($stmt);
                                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                            } else {
                                die("Something went wrong");
                            }
                        }
                    }
                    ?>
                </div>
                <div class="form-box">
                    <form action="signup.php" method="post">
                        <div class="top-text">
                            <span class="text-white">Already have an account? <a href="login.php" class="text-white">Login</a></span>
                            <header>Sign Up</header>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Full Name" name="username">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Email" name="email">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Password" name="password">
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password">
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <input type="submit" class="submit" value="Register" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>