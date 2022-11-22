
 <?php require_once('app/Models/Cart.php'); ?> 
 <?php require_once('app/Models/Category.php'); ?> 
 <?php require_once('core/Auth.php'); ?> 
 <?php require_once('app/Models/Users.php'); ?> 

<?php $cart = new Cart();
        $carts = $cart->show_cart(); ?>
<?php  $category = new Category();
        $categories = $category->show_category_shop(); ?>


<div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
						<option>¥ JPY</option>
						<option>$ USD</option>
						<option>€ EUR</option>
					</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                          
                            <li><a href="#">Our location</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="<?php echo url('homepage/index') ?>"><img src="<?php echo asset('web/images/logo.png')?>" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="<?php echo url('homepage/index') ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo url('homepage/show_about') ?>">About Us</a></li>
                            <li class="dropdown">
                            <a href="<?php echo url('shopproduct/s_shop') ?>" class="nav-link dropdown-toggle " data-toggle="dropdown">Product</a>
                            <ul class="dropdown-menu">
                            <?php foreach ($categories as $category) :?>
                                <li><a href="<?php echo url('shopproduct/s_shop_byCat/'.$category['id']) ?>"><?php echo $category['categoryName'] ?></a></li>
                                
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo url('cart/s_cart') ?>">Cart</a></li>
                                <?php if(Auth::getUser('user')) { ?>
                                <li><a href="<?php echo url('checkout/show_checkout') ?>">Checkout</a></li>
                                <?php }else{ ?>
                                    <li><a href="<?php echo url('auth/login') ?>">Checkout</a></li>
                                <?php }?>
                                <li><a href="<?php echo url('wishlist/index') ?>">Wishlist</a></li>

                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo url('homepage/show_service') ?>">Our Service</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo url('feedback/index') ?>">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->

                <?php if(Auth::getUser('user')){?>
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle bi bi-person-fill " type="button" data-bs-toggle="dropdown" aria-expanded="false" title="<?php echo Auth::getUser('user')['fullname'] ?>">    
                    </button>
              
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo url('auth/login') ?>" >My Profile</a></li>
                        <li><a class="dropdown-item" href="<?php echo url('orderdetail/show_detail') ?>">My Order</a></li>

                            <li><a class="dropdown-item" href="<?php echo url('auth/logout') ?>">Log out</a></li>

                    </ul>
                    </div>
                    <?php } else {?>

                        <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle bi bi-person-fill " type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Người dùng không tồn tại">    
                    </button>
              
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo url('auth/login') ?>" >My Profile</a></li>
                        <li><a class="dropdown-item" href="#">My Order</a></li>
                            <li><a class="dropdown-item" href="<?php echo url('auth/login') ?>">Log in</a></li>
                    </ul>
                    </div>
                        <?php } ?>
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge"><?php echo count($carts); ?></span>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <?php foreach ( $carts as $cart ) : ?>
                        <li>
                            <a href="#" class="photo"><img src="<?php echo asset('storage/images/'.$cart['thumbnail'])?>" class="cart-thumb" alt="" /></a>
                            <h6><?php echo $cart['productName'] ?></h6>
                            <p><?php echo $cart['price'] ?></p>
                        </li>

                        <?php endforeach; ?>
                        <li class="total">
                            <a href="<?php echo url('cart/s_cart') ?>" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>

                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>

        <!-- Start Top Search -->
        <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->


    