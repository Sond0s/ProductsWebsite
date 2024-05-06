<!-- Special products people liking -->
<?php
$brand = array_map(function ($pro) {
    return $pro['skintype_name'];
}, $product_shuffle);
$unique = array_unique($brand);
sort($unique);
shuffle($product_shuffle);
?>
<section id="special-products">
    <div class="container">
        <h4 class="font-rubik font-size-20 my-4"> All Skin Types</h4>
        <div id="filters" class="button-group text-right font-rubik font-size-18">
            <button class="btn is-checked" data-filter="*">All Brands</button>
            <?php
            array_map(function ($brand) {
                printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
            }, $unique);
            ?>
        </div>
        <div class="grid py-5">
            <?php
            array_map(function ($item) { ?>
                <div class="grid-item border <?php echo $item['skintype_name'] ?? "brand"; ?>">

                    <div class="item py-2 " style="width: 200px;">
                        <div class="product font-rale">
                            <a href="<?php printf('%s?product_id=%s','product.php',$item['product_id'])?>"><img src="<?php echo $item['image'] ?? "./products/starville-cleanser.jpg"; ?>" alt="product1" class="img-fluid"></a>
                            <div class="text-center">
                                <h6> <?php echo $item['product_name'] ?? "unknown"; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }, $product_shuffle); ?>
        </div>
    </div>
</section>