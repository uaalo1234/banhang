<?php include('views/web/layouts/index.php') ?>

<?php startblock('slider') ?>
    <?php include('views/web/includes/slider.php') ?>
<?php endblock() ?>

<?php startblock('content')?>
<?php //print_r($product);die();?>
<div class="col-sm-3">
    <?php include('views/web/includes/sidebar.php')?>
</div>
<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="<?php echo asset("storage/{$product->image()['image']}") ?>" alt="">
                <h3>ZOOM</h3>
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item">
                            <?php $images = $product->images(); ?>    

                            <?php foreach($images as $image): ?>
                            <a href="#"><img src="<?php echo "https://demo.themeum.com/html/eshopper/images/product-details/similar3.jpg" ?>" alt=""></a>             
                            <?php endforeach ?>
                        </div>            
                    </div>

                    <!-- Controls -->
                    <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                    </a>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt="">
                <h2><?php echo $product->name; ?></h2>
                <p>Web ID: 1089772</p>
                <img src="images/product-details/rating.png" alt="">
                <span>
                    <span><?php echo $product->formatPrice(); ?></span>
                    <label>Quantity:</label>
                    <input type="text" value="1">
                    <form action="<?php echo url("cart/add/{$product->id}") ?>" method="POST" style="display: inline;">
                        <button type="submit" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                    </form>
                </span>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""></a>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->
    
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Description</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details">
                <div class="col-sm-12">
                    <p><?php echo $product->description ?></p>
                </div>
            </div>         
        </div>
    </div><!--/category-tab-->
    
</div>
<?php endblock() ?>