<?php require_once('views/web/layouts/index.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php require_once('app/Models/Order.php');?>
<?php

$order = new Order();
$order = $order->findAll();
// print_r($order);die();
?>
<?php startblock('content') ?>

<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-box-main">
        <div class="container">
            
            <div class="row">

                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <?php if(Auth::getUser('user')) { ?>
                            <div class="title-left">
                                <h3>Thông tin giao hàng</h3>
                            </div>
                            <form method="POST" action="<?php echo url('order/handleOrder') ?>">
                                <div class="mb-3">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" name="userId" id="userId" value="<?php echo Auth::getUser('user')['id']?>">
                                  
                                </div>
                            </div>
                                <div class="mb-3">
                                <label for="username">Full Name *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo Auth::getUser('user')['fullname'] ?>" required>
                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo Auth::getUser('user')['email'] ?>" required >
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Phone Number *</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo Auth::getUser('user')['phone_number'] ?>" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo Auth::getUser('user')['address'] ?>" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Note</label>
                                <input type="text" class="form-control" id="note" name="note" required>
                                
                            </div>
                            <?php  } ?>       
                            <hr class="mb-4">
                            <div class="title"> <span>Phương thức thanh toán</span> </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="payment_method" type="radio" class="custom-control-input" value="Thanh toán khi nhận hàng" checked required>
                                    <label class="custom-control-label" for="debit">Thanh toán khi nhận hàng</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="payment_method" type="radio" class="custom-control-input" value="Đang bảo trì"  required>
                                    <label class="custom-control-label" for="credit">VNPAY (Nhà phát hành đang phát triển)</label>
                                </div>
                                
                            </div>
                            
                            <hr class="mb-4">
                            <div class="title"> <span>Phương thức giao hàng</span> </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="shipping_method1" name="shipping_method" type="radio" class="custom-control-input" value="Free" onchange="getShipping($(this).val())" checked required>
                                    <label class="custom-control-label" for="shipping_method1">Standard Delivery</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                    <div class="ml-4 mb-2 small">(3-7 business days)</div>                              
                                    <div class="custom-control custom-radio">
                                        <input id="shipping_method2" name="shipping_method" type="radio" class="custom-control-input" value="$10" onchange="getShipping($(this).val())"  required>
                                        <label class="custom-control-label" for="shipping_method2">VNExpress</label> <span class="float-right font-weight-bold">$10</span> </div>
                                        <div class="ml-4 mb-2 small">(2-4 business days)</div>                              
                                        
                                </div>
                                <hr class="mb-4">

                            <!-- <div class="col-12 d-flex shopping-box"> <button type="submit" class="ml-auto btn hvr-hover" 
                            style="color: white; padding: 10px 50px; font-size: 20px;border-radius: 15px;">Place Order</button> </div> -->
                         <!-- </form> --> 
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row"> 
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Giỏ hàng</h3>
                                </div>
                                <?php  $subtotal=0;
                                $subdiscount =0; ?>
                                <?php foreach($carts as $cart) : ?>
                                <div class="rounded p-2 bg-light">
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body" style=" font-size:20px;" > <a href="<?php echo url('shopproduct/show_product_detail/'.$cart['productId']) ?>"><?php echo $cart['productName'] ?></a>
                                            <div class="small text-muted" style=" font-size:15px;">Price : <?php echo $cart['price'] ?><span class="mx-2">|</span>
                                            Quantity : <?php echo $cart['quantity'] ?><span class="mx-2">|</span>
                                            Subtotal :<?php $total = $cart['price'] * $cart['quantity']; echo $total; ?><span class="mx-2">|</span>
                                            Discount :<?php $discount = $cart['price']* $cart['quantity'] * ($cart['discount'] / 100); echo "$".$discount; ?><span class="mx-2">|</span>
                                            Size : <?php echo $cart['size'] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php $subtotal += $total;
                                $subdiscount += $discount ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Đơn đặt hàng</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                        <div class="ml-auto font-weight-bold"><?php echo "$".' '.$subtotal; ?></div>
                                 </div>
                                    <div class="d-flex">
                                    <h4>VAT(10%)</h4>
                                        <div class="ml-auto font-weight-bold"><?php $vat = $subtotal * 0.1; echo "$".' '.$vat ?></div>
                        </div>
                        <div class="d-flex">
                                    <h4>Discount</h4>
                                        <div class="ml-auto font-weight-bold"><?php echo "$".' '.$subdiscount ?></div>
                        </div>
                                <hr>
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>

                                        <!-- <div class="ml-auto font-weight-bold">Free</div> -->
                                        <label class="ml-auto font-weight-bold" id="shipping">Free</label>
                        </div>
                                <hr>
                                <?php ?>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div id="grand_total" class="ml-auto h5"><?php $grtotal = $subtotal + $vat - $subdiscount; echo "$".' '.$grtotal ?></div>
                                </div>
                                <hr>
                        </div>
                      
                    </div>
                    <?php if(count($carts) > 0 ) {?>
                    <div class="col-12 d-flex shopping-box"> 
                    <button type="submit" class="ml-auto btn hvr-hover" 
                                style="color: white; padding: 10px 50px; font-size: 20px;border-radius: 15px;">Place Order</button> </div>
                    <?php }else{ ?>
                        <div class="col-12 d-flex shopping-box"><a href="<?php echo url('shopproduct/s_shop') ?>" class="ml-auto btn hvr-hover">Place Order</a> </div>
                        <?php }?>
                </div>
                </form>
            </div>
        </div>
    </div>
<script>
    function getShipping(getValue){
        document.getElementById('shipping').innerHTML=getValue;
    }
</script>
<?php endblock()?>