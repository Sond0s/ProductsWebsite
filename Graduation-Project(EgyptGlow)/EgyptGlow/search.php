<!-- Search bar results -->
<?php
include('header.php');
// Connect to your database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'skincareproject';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $search = $conn->real_escape_string($_GET['query']);
    $searchTerm = $search . "%";
    $sql = "SELECT * FROM product WHERE product_name LIKE '$searchTerm'";
    $result = $conn->query($sql);
    if ($result === false) {
        echo "Error executing the query: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            echo "<h3 class='mt-4 m-3'>Search Results</h3>";
            echo "<div class='row'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4 mb-4 text-center'>";
                echo "<a href='product.php?product_id=" . $row["product_id"] . "' class='product-link'>";
                echo "<img src='" . $row["image"] . "' alt='" . $row["product_name"] . "' class='img-fluid img-thumbnail' style='max-height: 400px;'>";
                echo "<p class='mt-2 mb-0 search-product-name font-pop'>" . $row["product_name"] . "</p>";
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
$conn->close();

include('footer.php');
?>
<style>
    .product-link {
        text-decoration: none;
    }

    .search-product-name {
        margin-top: 10px;
        font-size: 18px;
        font-weight: bold;
        color: #00224D;
        transition: color 0.3s;
    }

    .product-link:hover .search-product-name {
        color: #535C91;
    }

    .product-link:hover {
        text-decoration: none;
    }
</style>