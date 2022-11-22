
<form>
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <?php if($product['discount'] != 0 ) {?>
                                <div class="type-lb">
                                        <p class="sale"><?php echo '- '.$product['discount']."%"  ?></p>
                                    </div>
                                    <?php }else{?>
                                        <div class="type-lb">
                                        <p class="sale">New</p>
                                    </div>
                                    <?php }?>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="<?php echo asset('storage/images/'.$product['thumbnail'])?>" alt="First slide"> </div>
                            
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
                                <img class="d-block w-100 img-fluid" src="<?php echo asset('storage/images/'.$product['thumbnail'])?>" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?php echo $product['productName'] ?></h2>
                        <h5><?php echo $product['price'] ?></h5>
                            <p>
                                <h4>Short Description:</h4>
                                <p><?php echo $product['description'] ?></p>
                                <ul>
                                    <li>
                                        <div class="form-group size-st">
                                            <label class="size-label">Size</label>
                                            <select id="sel_size" name="size" class="selectpicker show-tick form-control">
                                            <option value="">Size</option>
                                            <?php foreach((explode(",",$product['size'])) as $value ) : ?>
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
                                        <input 	type="hidden" 	   name="pro_id"	 value="<?=$product['id']?>"   class="form-control" >
                                        
                                        <!-- </div>-->
                                    </div>                           
                                    </li>
                                </ul>
                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">

                                        <a class="btn hvr-hover" data-fancybox-close="" href="#">Buy New</a>
                                        <!-- <button class="btn hvr-hover" type="submit" name="submit" style="color: white; padding: 9px 20px; font-weight: 700;">Add to Cart</button> -->
                                        <a  class="add_cart_pro_detail btn hvr-hover" value="<?php echo $product['id'] ?>" style="color:white">Add to Cart</a> 
                                    </div>
                                </div>  
                    </div>
                </div>
            </div>
        </form>







