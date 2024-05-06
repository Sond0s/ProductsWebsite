<?php
$item_id = $_GET['product_id'] ?? 1;
foreach ($product->getData() as $item) :
    if ($item['product_id'] == $item_id) :
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Handle adding to wishlist
            if (isset($_POST['wishlist_submit'])) {
                $Wish->addToWishlist($_POST['wish_user_id'], $_POST['wish_product_id']);
            }
            // Handle adding to morning routine
            if (isset($_POST['morning_routine_submit'])) {
                $Morning->addToMorningRoutine($_POST['morning_user_id'], $_POST['morning_product_id']);
            }
            // Handle adding to evening routine
            if (isset($_POST['evening_routine_submit'])) {
                $Evening->addToEveningRoutine($_POST['evening_user_id'], $_POST['evening_product_id']);
            }
        }
?>
        <!-- product information -->
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- show the image of the item -->
                        <img src="<?php echo $item['image'] ?? "product_image" ?>" alt="product" class="img-fluid">
                        <div class="form-row pt-4 font-size-16 font-baloo">
                        </div>
                    </div>
                    <div class="col-sm-6 py-5 font-rale">
                        <!-- display product's name -->
                        <h1 class="color-second "><?php echo $item['product_name'] ?? "Unknown" ?></h1>
                        <p class="font-size-16"><?php echo $item['brand_name'] ?? "Unknown" ?></p>
                        <hr class="mg-0 color-second-bg">
                        <!-- display the specific product skintype -->
                        <tr class="font-size-16 ">
                            <td>
                                <h6 class="font-rubik font-size-20">Skin type</h6>
                                <p class="my-3"> <?php echo $item['skintype_name'] ?? "Unknown" ?></p>
                            </td>
                        </tr>

                        <!-- Product Price -->
                        <table class="my-3 font-rale">
                            <tr class="font-rubik font-size-18">
                                <td> <span class="font-size-20"><?php echo $item['product_price'] ?? "Unknown" ?> <span>LE</LEg></span></span>
                                </td>
                            </tr>
                        </table>

                        <!-- form to add products into wishlist table -->
                        <form method="post">
                            <input type="hidden" name="wish_product_id" value="<?php echo $item['product_id'] ?? '1'; ?>">
                            <input type="hidden" name="wish_user_id" value="<?php echo  1; ?>">
                            <?php
                            $wishlistIds = $Wish->getWishId($product->getData('wishlist'));
                            if (is_array($wishlistIds) && in_array($item['product_id'], $wishlistIds)) {
                                echo '<button type="submit" disabled class="btn btn-danger form-control mb-2">In The Wishlist</button>';
                            } else {
                                echo '<button type="submit" class="btn btn-primary form-control mb-2" name="wishlist_submit">Add to Wishlist</button>';
                            }
                            ?>

                            <!-- Add to Routine buttons -->
                            <div class="row">
                                <div class="col-6 col-md-6 mb-2 mb-md-0 py-2">
                                    <input type="hidden" name="morning_product_id" value="<?php echo $item['product_id'] ?? '1'; ?>">
                                    <input type="hidden" name="morning_user_id" value="<?php echo 1; ?>">
                                    <?php
                                    $morninglistIds = $Morning->getMorningId($product->getData('morning_routine'));
                                    if (is_array($morninglistIds) && in_array($item['product_id'], $morninglistIds)) {
                                        echo '<button type="submit" disabled class="btn btn-danger form-control mb-2">In The Morning Routine</button>';
                                    } else {
                                        echo '<button type="submit" class="btn btn-success form-control" name="morning_routine_submit">Add to Morning Routine</button>';
                                    }
                                    ?>

                                </div>
                                <div class="col-6 col-md-6 mb-2 mb-md-0 py-2">
                                    <input type="hidden" name="evening_product_id" value="<?php echo $item['product_id'] ?? '1'; ?>">
                                    <input type="hidden" name="evening_user_id" value="<?php echo  1; ?>">
                                    <?php
                                    $eveninglistIds = $Evening->getEveningId($product->getData('evening_routine'));
                                    if (is_array($eveninglistIds) && in_array($item['product_id'], $eveninglistIds)) {
                                        echo '<button type="submit" disabled class="btn btn-danger form-control mb-2">In The Evening Routine</button>';
                                    } else {
                                        echo '<button type="submit" class="btn btn-info form-control" name="evening_routine_submit">Add to Evening Routine</button>';
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Product description -->
                    <div class="col-12 my-3">
                        <h6 class="font-rubik font-size-20">Product Description</h6>
                        <hr class="color-second-bg">
                        <p class="font-rale font-size-14"><?php echo $item['description'] ?? "Unknown" ?></p>
                    </div>

                    <!-- Product Ingredients -->
                    <div class="col-12 my-3">
                        <h6 class="font-rubik font-size-20">Ingredients</h6>
                        <hr class="color-second-bg">
                        <p>
                        <dl class="font-rale font-size-14">
                            <?php echo $item['ingredients'] ?? "Unknown" ?>
                        </dl>
                        </p>
                    </div>
                </div>
            </div>
        </section>
<?php
    endif;
endforeach;
?>