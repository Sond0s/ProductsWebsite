<?php
$product_shuffle = $product->getData();
?>
<!-- Top Products -->
<section id="top-products">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20"> Top Trendy Products</h4>
        <hr>
        <!-- Owl Carousel -->
        <div class="owl-carousel owl-theme">
            <?php
            foreach ($product_shuffle as $item) {
            ?>
                <!-- First Carousel Product -->
                <div class="item py-2">

                    <div class="product font-rale">
                        <a href="<?php printf('%s?product_id=%s','product.php',$item['product_id'])?>"><img src="<?php echo $item['image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo  $item['product_name'] ?? "Unknown";  ?></h6>
                        </div>
                    </div>
                </div>
            <?php } //close php code
            ?>
        </div>
</section>