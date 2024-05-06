<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login & Registration Form</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <div class="wrapper">
        <div class="form-box">
            <div class="login-container" id="login">
                <form action="login.php" method="post">
                    <div class="top">
                        <span>Don't have an account? <a href="signup.php">Sign Up</a></span>
                        <header>Login</header>
                    </div>
                    <div class="error-text">
                        <?php
                        if (isset($_POST["login"])) {
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            require_once "dbconnect.php";
                            $sql = "SELECT * FROM user WHERE email = '$email'";
                            $result = mysqli_query($conn, $sql);
                            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            if ($user) {
                                if (password_verify($password, $user["password"])) {
                                    session_start();
                                    $_SESSION["user"] = "yes";
                                    header("Location: ../index.php");
                                } else {
                                    echo "<div class='alert alert-danger'>Wrong Password</div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger'>Email doesn't exist</div>";
                            }
                        }
                        ?>
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
                        <input type="submit" class="submit" value="Sign In" name="login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>