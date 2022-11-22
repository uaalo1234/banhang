<?php require_once('views/web/layouts/index.php'); ?>
<?php require_once ('core/Auth.php') ?>
<?php startblock('content') ?>
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Wishlist</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="wishlist-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Unit Price </th>
                                    <th>Add Item</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php if (Auth::getUser('user')){ ?>
                                    <?php foreach ($wishlists as $wishlist) : ?>
                                    <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="<?php echo asset('storage/images/'.$wishlist['thumbnail'])?>" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                        <?php echo $wishlist['productName'] ?>
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p> <?php echo $wishlist['price'] ?></p>
                                    </td>
                                    <td class="add-pr">
                                        <a class="btn hvr-hover" href="<?php echo url('shopproduct/show_product_detail/'.$wishlist['productId']) ?>">Add to Cart</a>
                                    </td>
                                    <td class="remove-pr">
                                        <a  onclick=" return confirm('Are you sure!!')" href="<?php echo url('wishlist/delete_wishlist/'.$wishlist['id'])?>">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
<?php endblock() ?>