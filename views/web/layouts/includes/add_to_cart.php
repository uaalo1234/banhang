
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
   <div class="modal-body">
    <div class="shop-detail-box-main">
        <div class="container">
            <form method="POST" action="<?php echo url('cart/add_cart') ?>">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <?php if($pro_detail['discount'] != 0 ) {?>
                                <div class="type-lb">
                                        <p class="sale"><?php echo $pro_detail['discount']."%"  ?></p>
                                    </div>
                                    <?php }else{?>
                                        <div class="type-lb">
                                        <p class="sale">New</p>
                                    </div>
                                    <?php }?>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="<?php echo asset('storage/images/'.$pro_detail['thumbnail'])?>" alt="First slide"> </div>
                            
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="<?php echo asset('storage/images/'.$pro_detail['thumbnail'])?>" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?php echo $pro_detail['productName'] ?></h2>
                        <h5><?php echo $pro_detail['price'] ?></h5>
                            <p>
                                <h4>Short Description:</h4>
                                <p><?php echo $pro_detail['description'] ?></p>
                                <ul>
                                    <li>
                                        <div class="form-group size-st">
                                            <label class="size-label">Size</label>
                                            <select id="sel_size" name="size" class="selectpicker show-tick form-control">
                                            <option value="">Size</option>
                                            <?php foreach((explode(",",$pro_detail['size'])) as $value ) : ?>
									<option name="size"  value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                     <?php endforeach; ?>
								</select>
                                        </div>
                                    </li>
                                    <li>
                                    <div class="form-group size-st">
                                            <label class="size-label">Quantity</label>
                                        <!-- <div class="btn-group" role="group" aria-label="Basic example" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                        <!-- <button type="button" 	id="dec" 			class="btn btn-primary dec">-</button> -->
                                        <input 	type="number" 	id="quantity"   name="quantity"	 value="quantity"   class="form-control"  min="1" max="100" 
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                        <input 	type="hidden" 	   name="productId"	 value="<?=$pro_detail['id']?>"   class="form-control" >
                                        
                                        <!-- </div>-->
                                    </div>                           
                                    </li>
                                </ul>

                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">

                                        <a class="btn hvr-hover" data-fancybox-close="" href="#">Buy New</a>
                                        <button class="btn hvr-hover" type="submit" name="submit">Add to Cart</button>
                                        <!-- <a  class="btn hvr-hover" href="javascript:void(0);" onclick="add_to_cart('','<?php echo $pro_detail['id'] ?>','1')" >Add to Cart</a> -->
                                    </div>
                                </div>
                           
                                
                                <div class="add-to-btn">
                                    <div class="add-comp">
                                        <a class="btn hvr-hover" href="javascript:void(0);" onclick="add_to_wishlist('','<?php echo $pro_detail['id'] ?>','<?php echo Auth::getUser('user')['id'] ?>')"><i class="fas fa-heart"></i> Add to wishlist</a>
                                        <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>
                                    </div>
                                    
                                </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" name="submit" data-bs-dismiss="modal">Add to cart</button>
        </div>
    </form>
        
    </div>
  </div>
</div>
