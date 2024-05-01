<!-- Special products people liking -->
<?php
$product_shuffle = $product->getData();
shuffle($product_shuffle);
?>
<!-- Top Products -->
<section id="top-products">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Reccomended brands& its famous products</h4>
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
                            <h6><?php echo  $item['brand_name'] ?? "Unknown";  ?></h6>
                        </div>
                    </div>
                </div>
            <?php } //close php code
            ?>
        </div>
</section>