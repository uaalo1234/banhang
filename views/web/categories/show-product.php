<?php include('views/web/layouts/index.php') ?>

<?php startblock('slider')?>
    <?php include('views/web/includes/slider.php')?>
<?php endblock()?>

<?php startblock('content')?>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <?php include('views/web/includes/sidebar.php')?>
        </div>

        <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
            <?php if (count($products) > 0) :?>
                <?php foreach($products as $product): ?>
                    <div class="col-sm-4">
                        <?php include('views/web/includes/product.php')?>
                    </div>
            <?php endforeach ?>
                <?php else: ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        No products found
                    </div>
                </div>
                <?php endif; ?>
            </div> 
        </div><!--features_items-->
        </div>
    </div>
</div>
<?php endblock()?>
