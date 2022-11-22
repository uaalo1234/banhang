<?php require_once('app/Models/Category.php');?>
<?php require_once('app/Models/Brand.php'); ?>

<?php         $category = new Category();
        $categories = $category->show_category_shop();
        $brand = new Brand();
        $brands = $brand->show_brand_shop();
        ?>

<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <?php foreach( $categories as $category ) : ?>
                                <a href="<?php echo url('shopproduct/productbyCategory/'.$category['id']) ?>" class="list-group-item list-group-item-action"><?php echo $category['categoryName'] ?></a>
                            <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>Brand</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <?php foreach( $brands as $brand ) : ?>
                                <a href="<?php echo url('shopproduct/productbyBrand/'.$brand['id']) ?>" class="list-group-item list-group-item-action"><?php echo $brand['brandName'] ?></a>
                            <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>