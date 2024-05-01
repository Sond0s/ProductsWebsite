<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        .signup-container {
            max-width: 500px;
            margin: auto;
            margin-top: 100px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }
        .login-link a {
            text-decoration: none;
            color: #00224D;
            /* Remove underline */
        }

        .login-link a:hover {
            color:#535C99;
            /* Change link color on hover */
        }
    </style>
</head>

<body>
    <div class="container font-rubik">
        <div class="signup-container">
            <h2 class="text-center mb-4 color-second">Sign Up</h2>
            <form id="signupForm" method="post" action="signup.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="fullname" name="fname" placeholder="Full Name" >
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="username" name="username" placeholder="User Name" >
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                </div>
                <button type="submit" class="btn color-second-bg btn-block text-white">Sign Up</button>
            </form>
            <div class="color-primary login-link">
                <div class="text-center mt-3">
                    <a href="login.php">Already have an account? Log In</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript for handling form submission -->
    
</body>

</html>
