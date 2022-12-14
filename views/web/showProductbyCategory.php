<div  class="row cate$category-categorie-box">
                            <!-- show san pham -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        <?php foreach( $data as $category) : ?>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="<?php echo asset('storage/images/'.$category['thumbnail'])?>" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="<?php echo url('shopproduct/show_product_detail/'.$category['id']) ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="<?php echo url('wishlist/add_to_wishlist/'.$category['id']) ?>" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" value="<?php echo $category['id']?>" style="background-color:red;" >Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                <a href="<?php echo url('shopproduct/show_product_detail/'.$category['id']) ?>"><h4><?php echo $category['productName']?></h4></a>
                                                    <h5><?php echo $category['price'] ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">                     
                                    <div class="list-view-box">
                                        <div class="row">
                                        <?php foreach( $data as $category) : ?>
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                               
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="sale">Sale</p>
                                                        </div>
                                                        <img src="<?php echo asset('storage/images/'.$category['thumbnail'])?>" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="<?php echo url('shopproduct/show_product_detail/'.$category['id']) ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                <a href="<?php echo url('shopproduct/show_product_detail/'.$category['id']) ?>"><h4><?php echo $category['productName']?></h4></a>
                                                    <h5><?php echo $category['price']?></h5>
                                                    <p><?php echo $category['description'] ?></p>
                                                    <a class="cart" value="<?php echo $category['id']?>" style="background-color:red;" >Add to Cart</a>

                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                    <div class="modal fade" id="empModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="font-size:25px">Chi ti???t s???n ph???m</h5>
                            </div>
                        <div class="modal-body">
                                ....
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="add_cart btn btn-primary" >Add to Cart</button>
                        </div>
                    </div>
            </div>
        </div>