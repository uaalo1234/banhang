<?php require_once('app/Models/Product.php'); ?>
<?php $id = $_POST['id'];
     $product = new Product();
     $product = $product->s_pro_modal($id); ?>
        <form method="POST" action="<?php echo url('cart/add_cart') ?>">
                <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <?php if($product['discount'] != 0 ) {?>
                                <div class="type-lb">
                                        <p class="sale"><?php echo $product['discount']."%"  ?></p>
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
                                            <select id="sel_size" name="size" class="form-control">
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
                                        <input 	type="hidden" id="productId" name="productId"	 value="<?=$product['id']?>"   class="form-control" >
                                        
                                        <!-- </div>-->
                                    </div>                           
                                    </li>
                                </ul>
                                              
                                    </div>
                                </div>
                            </div>
                    </form>
<script>
 $(document).ready(function () {
    add_to_cart()
    function add_to_cart() {    
        $(document).on('click','.add_cart',function(e) {
            e.preventDefault();
            var product_id = $("#productId").val();
            var qty = $("#quantity").val();
            var sel_size = $("#sel_size").val();
            // if(qty == ""){
            //     alert("Yêu cầu nhập số lượng");
            // }elseif(sel_size == ""){
            //     alert("Yêu cầu nhập size");
            // }
            // alert(sel_size)
            $.ajax({
                method : 'POST',
                url: '<?php echo url('cart/add_cart_1') ?>',
                data: {productId : product_id, quantity : qty, size : sel_size },
                success: function() {
                Swal.fire({
                    position: 'success',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                    })
			},
            // $("#empModal").on("hidden.bs.modal",function () {
            //     getfeat()
            // })
			error: function() {
			}       
		})
		return false;
    })
 }
})
</script>