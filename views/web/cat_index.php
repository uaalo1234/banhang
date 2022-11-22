

<div class="categories-shop">
        <div class="container">
            <div class="row">
                    <?php foreach ($data as $category) : ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="<?php echo asset('storage/images/'.$category['thumbnail'])?>" alt="" />
                        <a class="show_pro_cat_index btn hvr-hover" href="<?php echo url('shopproduct/s_shop_byCat/'.$category['id']) ?>"><?php echo $category['categoryName'] ?></a>
                    </div>
                    
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


