
<?php require_once('views/web/layouts/index.php'); ?>
<?php require_once('app/Models/Category.php'); ?>
<?php require_once('app/Models/Product.php'); ?>
<?php require_once('core/Auth.php');?>
<?php startblock('content') ?>
<div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="<?php echo asset('web/images/banner-01.jpg')?>" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="<?php echo asset('web/images/banner-02.jpg')?>" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="<?php echo asset('web/images/banner-03.jpg')?>" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>

    <div id="show_cat">
            .....
    </div>

    <div class="products-box">
            <div id="show_featured">
                ....................
            </div>
    </div>
 
<?php endblock() ?>
<script>
    $(document).ready(function(){
        getfeat()
        getcate()
        function getfeat() {
        $.get("<?php echo url('homepage/show_feat') ?>",function (data) {
            $("#show_featured").html(data);
        })}

        function getcate() {
        $.get("<?php echo url('homepage/show_cat') ?>",function (data) {
            $("#show_cat").html(data);
        })
    }
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



