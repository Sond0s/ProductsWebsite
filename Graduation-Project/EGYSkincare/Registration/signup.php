<?php
require "function.php";
$response = '';
if (isset($_POST['submit'])) {
    $response = registerUser($_POST['email'], $_POST['username'], $_POST['password'], $_POST['confirmpassword']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Gradient background for the whole page */
        body {
            background: linear-gradient(60deg, #00224D, #535C91);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: space-between;
            overflow: hidden;
            /* Hide overflow to prevent horizontal scrollbar */
        }

        /* Background image for the left side */
        .left-bg {
            width: 40%;
            /* Adjust width */
            background-image: url('../banner/R\ \(1\).jpeg');
            /* Add your image path */
            background-size: cover;
            background-position: center;
            filter: blur(2px);
            /* Apply blur effect */
        }

        /* Signup container styles */
        .signup-container {
            width: 60%;
            /* Adjust width */
            height: 80vh;
            /* Adjust height */
            padding: 50px;
            box-sizing: border-box;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Signup form styles */
        #signupForm {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            /* Make the form width 100% */
            max-width: 400px;
            /* Add maximum width to keep the form centered */
        }

        /* Color styles */
        .color-second {
            color: white;
        }

        .color-primary {
            color: #f0f0f0;
        }

        .color-second-bg {
            background-color: #535C91;
        }
    </style>
</head>

<body>
    <!-- Left background image with blur effect -->
    <div class="left-bg"></div>

    <!-- Signup form container -->
    <div class="container-fluid font-rubik signup-container">
        <h2 class="text-center mb-4 color-second">Sign Up</h2>
        <form id="signupForm" method="post" action="" autocomplete="off">
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required value="<?php echo @$_POST['username'] ?>">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?php echo @$_POST['email'] ?>">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required value="<?php echo @$_POST['password'] ?>">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required value="<?php echo @$_POST['confirmpassword'] ?>">
            </div>
            <button type="submit" class="btn color-second-bg btn-block text-white">Sign Up</button>

            <!-- function returns -->
            <?php
            if (!empty($response)) {
                if ($response === 'success') {
            ?>
                    <p class="success">Your registration was successful</p>
                <?php
                } else {
                ?>
                    <p class="error"><?php echo $response; ?></p>
            <?php
                }
            }
            ?>


        </form>
        <div class="color-primary login-link">
            <div class="text-center mt-3">
                <a href="login.php" class="text-white">Already have an account? Log In</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>