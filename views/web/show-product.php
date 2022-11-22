<?php require_once('views/web/layouts/index.php'); ?>
<?php require_once('core/Auth.php'); ?> 
<?php require_once('app/Models/Cart.php'); ?>

<?php startblock('content') ?>
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
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
                            <?php foreach( $data['categories'] as $category ) : ?>
                                <div value="<?php echo $category['id'] ?>" class="show_pro_cat list-group-item list-group-item-action"><?php echo $category['categoryName'] ?></div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>Brand</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <?php foreach( $data['brands'] as $brand ) : ?>
                                <div value="<?php echo $brand['id'] ?>" class="show_pro_br list-group-item list-group-item-action"><?php echo $brand['brandName'] ?></div>
                            <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Selling</option>
								</select>
                                </div>
                                <p>Showing all 4 results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="show_pro">
                            <!-- show san pham -->
                        </div>
                    </div>
                    <div style="float:right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php endblock() ?>
<script>
     $(document).ready(function(){
        getProduct()
        function getProduct() {
        $.get("<?php echo url('shopproduct/show_shop') ?>",function (data) {
            $("#show_pro").html(data);
        })}
    $('.show_pro_cat').on('click',function() {
        var cat_id = $(this).attr("value");
        // alert(cat_id);
        $.ajax({
            method : 'GET',
			url: '<?php echo url('shopproduct/productbyCategory') ?>',
            data: {id : cat_id},
            success: function(data) {
                $("#show_pro").html(data);
			},
			error: function() {
			}       
		})
		return false;
        })
        $('.show_pro_br').on('click',function() {
        var br_id = $(this).attr("value");
        // alert(cat_id);
        $.ajax({
            method : 'GET',
			url: '<?php echo url('shopproduct/productbyBrand') ?>',
            data: {id : br_id},
            success: function(data) {
                $("#show_pro").html(data);
			},
			error: function() {
			}       
		})
		return false;
        })
        
        $(document).on('click','.cart',function() {
        var pro_id = $(this).attr("value");
        // alert(pro_id);
        $.ajax({
            method : 'POST',
			url: '<?php echo url('shopproduct/show_product_modal') ?>',
            data: { id : pro_id},
            success: function(data) {
                $(".modal-body").html(data);
                $("#empModal").modal('show');
			},
			error: function() {
			}       
		})
		return false;
    })

})
</script>
   