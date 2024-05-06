<!-- Simple reccomendation system based on wishlist products -->
<?php
include('header.php');
require_once "functions.php";
$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = ''; 
$db_name = 'skincareproject'; 

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = 1; // Example user ID

function getUserWishlistBrandsAndSkinTypes($userId)
{
    global $conn; 
    $query = "SELECT DISTINCT p.brand_name, p.skintype_name 
                FROM wishlist w
                JOIN product p ON w.product_id = p.product_id
                WHERE w.user_id = $userId";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error in SQL query: " . mysqli_error($conn));
    }
    $brandsAndSkinTypes = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $brandsAndSkinTypes[] = $row;
    }
    return $brandsAndSkinTypes;
}

$wishlistBrandsAndSkinTypes = getUserWishlistBrandsAndSkinTypes($userId);

$conditions = array();

foreach ($wishlistBrandsAndSkinTypes as $wishlistItem) {
    $brandName = $wishlistItem['brand_name'];
    $skinTypeName = $wishlistItem['skintype_name'];
    $conditions[] = "(brand_name = '$brandName' AND skintype_name = '$skinTypeName')";
}

$whereClause = implode(" OR ", $conditions);
// Query to get recommended products based on wishlist brands and skin types excluding wishlist products
$query = "SELECT * FROM product WHERE ($whereClause) AND product_id NOT IN 
            (SELECT product_id FROM wishlist WHERE user_id = $userId)";
            
$recommendedProductsResult = mysqli_query($conn, $query);

if (!$recommendedProductsResult) {
    die("Error in SQL query: " . mysqli_error($conn));
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommended Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5 font-pop">
        <h4 class="mx-2 my-5">Recommended Products Based on Wishlist Products</h4>
        <div class="row">
            <?php while ($product = mysqli_fetch_assoc($recommendedProductsResult)) : ?>
                <div class="col-md-3 mb-3">
                    <div class="card">
                    <a href="<?php printf('%s?product_id=%s','product.php',$product['product_id'])?>"><img src="<?php echo $product['image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
