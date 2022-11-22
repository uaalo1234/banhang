

<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th width="15%">Quantity</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php  $subtotal=0;
                               $subdiscount = 0;
                                ?>
                              <?php foreach($carts as  $key => $cart ) : ?>
                                <tr id="tr_<?php echo $cart['id'] ?>">
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="<?php echo asset('storage/images/'.$cart['thumbnail'])?>" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
									<?php echo $cart['productName']?>
								</a>
                                    </td>
                                    </td>
                                    <td class="size-pr">
									<?php echo $cart['size']?>
                                    </td>
                                    <td class="price-pr">
                                        <p><?php echo $cart['price']?></p>
                                    </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
											<input type="hidden" id="id_<?=$key?>" value="<?=$cart['id']?>" class="form-control">
											<button type="button" data="<?=$key?>" 		id="discount" 			class="btn btn-primary discount">-</button>
											<input 	type="number" data="<?=$key?>" 		id="quantity_<?=$key?>"	class="form-control change"  min="1" max="100" value="<?=$cart['quantity']?>" 
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
											<button type="button" data="<?=$key?>" 		id="increase" 			class="btn btn-primary increase">+</button>
										</div>
                                        </td>
                                    <td class="discount-pr">
                                        <p><?php echo "("."-".$cart['discount']."%".")"." "?><?php $discount = $cart['price']* $cart['quantity'] * ($cart['discount'] / 100); echo "$".$discount; ?></p>
                                    </td>
                                    <td class="total-pr">
                                        <p><?php  $total = ($cart['quantity'] * $cart['price']); echo $total.' '.'$' ?></p>
                                    </td>
                                    <td><button type="button" class="del_cart btn btn-danger" value="<?php echo $cart['id']?>">Delete</button></td>
                                </tr>
                                  <?php $subtotal += $total;?>
                                  <?php $subdiscount += $discount;?>

                                <?php  endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="reload_price order-box">
                        <h3>Order summary</h3>
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
                            <div class="ml-auto font-weight-bold"><?php echo "$".' '.$subdiscount; ?></div>
                        </div>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"><?php $grtotal = $subtotal + $vat - $subdiscount ; echo "$".' '.$grtotal ?></div>
                        </div>
                        <hr> 
                    </div>
                </div>
                <?php if(Auth::getUser('user') && count($carts) > 0) { ?>           
                <div class="col-12 d-flex shopping-box"><a href="<?php echo url('checkout/show_checkout') ?>" class="ml-auto btn hvr-hover">Checkout</a> </div>
                <?php }else{ ?>
                    <div class="col-12 d-flex shopping-box"><a href="<?php echo url('auth/handleLogin') ?>" class="ml-auto btn hvr-hover">Checkout</a> </div>
                <?php }?>
            </div>
        </div>
    </div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>


