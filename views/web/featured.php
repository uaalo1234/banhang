
<?php require_once('app/Models/Category.php'); ?>
<?php require_once('app/Models/Product.php'); ?>
<?php require_once('core/Auth.php');?>
<div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".top-featured">Top featured</button>
                            <button data-filter=".best-seller">Best seller</button>
                        </div>
                    </div>
                </div>
            </div>

<div class="row special-list">
                <?php foreach ($data as $product) :?>
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover"> 
                            <?php if($product['discount'] != 0 ) {?>
                        <div class="type-lb">
                                <p class="sale"><?php echo '- '.$product['discount']."%"  ?></p>
                            </div>
                            <?php }else{?>
                                <div class="type-lb">
                                <p class="sale">New</p>
                            </div>
                            <?php }?>
                            <img src="<?php echo asset('storage/images/'.$product['thumbnail'])?>" class="img-fluid" alt="Image"  >
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="<?php echo url('shopproduct/show_product_detail/'.$product['id']) ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="javascript:void(0);" onclick="add_to_wishlist('','<?php echo $product['id'] ?>','<?php echo Auth::getUser('user')['id'] ?>')" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" value="<?php echo $product['id']?>" style="cursor:pointer;">Add to Cart</a>

                            </div>
                        </div>
                        <div class="why-text">
                            <a href="<?php echo url('shopproduct/show_product_detail/'.$product['id']) ?>"><h4><?php echo $product['productName']?></h4></a>
                            <h5><?php echo $product['price']?></h5>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="empModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="font-size:25px">Chi tiết sản phẩm</h5>
                            </div>

                        <div class="modal-body">
                                ....
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="add_cart btn btn-primary" >Add to Cart</button>
                        </div>
                    </div>
                    </div>
                </div>