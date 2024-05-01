<?php
//include the "header.php" file
include('header.php');

// Connect to your database
$db_host = 'localhost'; // Change this to your database host
$db_user = 'root'; // Change this to your database username
$db_pass = ''; // Change this to your database password
$db_name = 'skincareproject'; // Change this to your database name

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the query parameter exists and is not empty
if (isset($_GET['query']) && !empty($_GET['query'])) {
    // Sanitize the input to prevent SQL injection
    $search = $conn->real_escape_string($_GET['query']);

    // Add a wildcard % only at the end of the search term
    $searchTerm = $search . "%";

    // Query to search for the product
    $sql = "SELECT * FROM product WHERE product_name LIKE '$searchTerm'";
    $result = $conn->query($sql);

    // Check if query was successful
    if ($result === false) {
        // Display an error message
        echo "Error executing the query: " . $conn->error;
    } else {
        // Display search results
        if ($result->num_rows > 0) {
            echo "<h3 class='mt-4 m-3'>Search Results</h3>";
            echo "<div class='row'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4 mb-4 text-center'>";
                echo "<a href='product.php?product_id=" . $row["product_id"] . "' class='product-link'>";
                echo "<img src='" . $row["image"] . "' alt='" . $row["product_name"] . "' class='img-fluid img-thumbnail' style='max-height: 400px;'>";
                echo "<p class='mt-2 mb-0 search-product-name font-baloo'>" . $row["product_name"] . "</p>";
                echo "</a>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p class='mt-4'>No results found</p>";
        }
    }
} else {
    echo "<p class='mt-4'>No search query provided</p>";
}

// Close database connection
$conn->close();

//include the "footer.php" file
include('footer.php');
?>
<style>
    /* Remove underline from product links */
    .product-link {
        text-decoration: none;
    }

    /* Style the product name */
    .search-product-name {
        margin-top: 10px;
        font-size: 18px;
        font-weight: bold;
        color: #00224D;
        /* Default color of the product name */
        transition: color 0.3s;
        /* Smooth transition effect for color change */
    }

    /* Change color of product name when hovered */
    .product-link:hover .search-product-name {
        color: #535C91;
        /* Change to the desired color when hovered */
    }

    /* Remove underline from product name when hovered */
    .product-link:hover {
        text-decoration: none;
    }
</style>