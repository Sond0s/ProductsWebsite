<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Egy Skincare</title>
    <!-- CSS bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Owl Carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css file link -->
    <link rel="stylesheet" href="HTML Template/style.css">
    <?php
    // fetch php functions
    require('functions.php');
    ?>
</head>

<body>
    <header id="header">
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light ">
            <p class="font-rale font-size-18 text-black-50 m-0">
                <span class="d-block d-sm-inline font-size-20">Welcome</span>
                <a href="Registration/logout.php" class="mx-3 text-black">Logout</a>
            </p>
            <div class="font-pop font-size-18 d-flex align-items-center">
                <!-- Search Input -->
                <form class="d-flex" action="search.php" method="GET">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search for a product" aria-label="Search" name="query" id="searchInput">
                        <button class="btn color-second-bg mb-2 color-primary" type="submit" onclick="showProducts()"> <i class="fas fa-search"></i> </button>
                    </div>
                </form>
                <!-- Login and Wishlist Links -->
                <div class="ms-3">
                    <a href="Registration/login.php" class="px-3 border-right border-left text-dark " style="text-decoration: none;">Login</a>
                    <a href="wishlist.php" class="px-3 border-right text-dark" style="text-decoration: none;">Wishlist</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Primary Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg font-size-18 font-pop sticky-top">
        <div class="container-fluid color-second-bg">
            <a class="navbar-brand" href="index.php">
                <img src="banner/logo.png" style="width: 200px;" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav m-auto p-1">
                    <a class="nav-link" href="brands.php">Brands</a>
                    <a class="nav-link" href="category.php">Categories</a>
                    <a class="nav-link" href="skintype.php">Skin Types</a>
                    <a class="nav-link" href="ingredient.php">Ingredients</a>
                    <a class="nav-link" href="routine.php">My Daily Routine</a>
                    <a class="nav-link" href="reccomends.php">Recommends</a>
                </div>
            </div>
        </div>
    </nav>
    <main id="main-site">