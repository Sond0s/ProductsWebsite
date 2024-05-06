<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-evening-routine-product'])) {
        $deletedrecord = $Evening->deleteEveningRoutineProduct($_POST['item_id']);
    }
    if (isset($_POST['delete-morning-routine-product'])) {
        $deletedrecord = $Morning->deleteMorningRoutineProduct($_POST['item_id']);
    }
}
?>

<section>
    <div class="container mt-5">
        <div class="row routine-section">
            <!-- Morning routine products -->
            <div class="col-md-6 font-pop">
                <h3>Morning Routine <i class="fas fa-sun color-yellow"></i></h3>
                <ul id="morningRoutine" class="list-group">
                    <?php
                    foreach ($product->getData("morning_routine") as $item) :
                        $morningroutine =  $product->getProduct($item['product_id']);
                        array_map(function ($item) {
                    ?>
                            <li>
                                <div class="row border-top py-3 mt-3 ">
                                    <div class="col-sm-2">
                                        <!-- display the products image from product table -->
                                        <a href="<?php printf('%s?product_id=%s', 'product.php', $item['product_id']) ?>"><img src="<?php echo $item['image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-8">
                                        <!-- display product's name -->
                                        <h5 class="font-rale font-size-20"><?php echo $item['product_name'] ?? "unknown"; ?></h5>
                                        <!-- display brand's name -->
                                        <small>by <?php echo $item['brand_name'] ?? "unknown"; ?></small>
                                        <div class="qty d-flex pt-2">

                                            <!-- form to delete a product from the morning-routine list -->
                                            <form method="post">
                                                <input type="hidden" value="<?php echo $item['product_id'] ?? 0; ?>" name="item_id">
                                                <button type="submit" name="delete-morning-routine-product" class="btn font-baloo text-danger px-3 ">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 text-right">
                                    </div>
                                </div>
                            </li>
                    <?php
                        }, $morningroutine); //close the arraymap function
                    endforeach; ?>
                </ul>
            </div>
            <!-- Evening routine products -->
            <div class="col-md-6 font-pop">
                <h3>Evening Routine <i class="fas fa-moon color-primary"></i></h3>
                <ul id="eveningRoutine" class="list-group">
                    <?php foreach ($product->getData("evening_routine") as $item) :
                        $eveningroutine =  $product->getProduct($item['product_id']);
                        array_map(function ($item) {
                    ?>
                            <li>
                                <div class="row border-top py-3 mt-3 ">
                                    <div class="col-sm-2">
                                        <!-- display the products image from product table -->
                                        <a href="<?php printf('%s?product_id=%s', 'product.php', $item['product_id']) ?>"><img src="<?php echo $item['image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                                    </div>
                                    <div class="col-sm-8">
                                        <!-- display product's name -->
                                        <h5 class="font-baloo font-size-20"><?php echo $item['product_name'] ?? "unknown"; ?></h5>
                                        <!-- display brand's name -->
                                        <small>by <?php echo $item['brand_name'] ?? "unknown"; ?></small>
                                        <div class="qty d-flex pt-2">

                                            <!-- form to delete a product from the evening-routine list -->
                                            <form method="post">
                                                <input type="hidden" value="<?php echo $item['product_id'] ?? 0; ?>" name="item_id">
                                                <button type="submit" name="delete-evening-routine-product" class="btn font-baloo text-danger px-3 ">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 text-right">
                                    </div>
                                </div>
                            </li>
                    <?php
                        }, $eveningroutine);
                    endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>