<div class="product-image-wrapper">
    <div class="single-products">
            <div class="productinfo text-center">
                <?php //print_r($product->image()['image'])?>
                <a href="<?php echo url("products/show/{$product->id}") ?>"><img src="<?php echo asset("storage/{$product->image()['image']}") ?>" alt=""></a>
                <h2><?php echo $product->formatPrice(); ?></h2>
                <p><?php echo $product->name; ?></p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2><?php echo $product->formatPrice(); ?></h2>
                    <a href="<?php echo url("products/show/{$product->id}") ?>"><p><?php echo $product->name; ?></p></a>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
            </div>
    </div>
    <div class="choose">
        <ul class="nav nav-pills nav-justified">
            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
        </ul>
    </div>
</div>