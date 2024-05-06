<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-wish-product'])){
            $deletedrecord = $Wish->deleteProduct($_POST['item_id']);
        }
    }
?>
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-pop font-size-20">Wishlist Products</h5>
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData('wishlist') as $item) :
                    $wishlist = $product->getProduct($item['product_id']);
                    array_map(function ($item) {
                ?>
                        <div class="row border-top py-3 mt-3 ">
                            <div class="col-sm-2">
                                <!-- display the products image from product table -->
                                <a href="<?php printf('%s?product_id=%s','product.php',$item['product_id'])?>"><img src="<?php echo $item['image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-8">
                                <!-- display product's name -->
                                <h5 class="font-baloo font-size-20"><?php echo $item['product_name'] ?? "unknown"; ?></h5>
                                <!-- display brand's name -->
                                <small>by <?php echo $item['brand_name'] ?? "unknown"; ?></small>
                                <div class="qty d-flex pt-2">

                                    <!-- form to delete a product from the wishlist -->
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['product_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" name="delete-wish-product" class="btn font-baloo text-danger px-3 ">Delete</button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-sm-2 text-right">
                                <!-- display products price -->
                                <div class="font-size-20 text-danger font-baloo">
                                    LE <span class="product_price" data-id=""><?php echo $item['product_price'] ?? "0.00"; ?></span>
                                </div>
                            </div>
                        </div>
                <?php
                    }, $wishlist); //close the array function
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>
