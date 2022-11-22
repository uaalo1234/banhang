<?php require_once('views/web/layouts/index.php'); ?>
<?php require_once('core/Auth.php') ?>
<?php startblock('content') ?>
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-detail-box-main">
        <div class="container">
            <div id="show_pro_detail">

            </div>
            <div id="show_feat">
                
            </div>
            
        </div>
    </div>
<?php endblock() ?>
<script>
$(document).ready(function(){
        getfeat()
        getProDetail()
        function getfeat() {
        $.get("<?php echo url('homepage/show_feat') ?>",function (data) {
            $("#show_feat").html(data);
        } 
        )}
        function getProDetail() {
        var pro_id = "<?php echo $_GET['id']?>";
        $.ajax({
            method : 'GET',
			url: '<?php echo url('shopproduct/show_pro_detail') ?>',
            data: {id : pro_id},
            success: function(data) {
                $("#show_pro_detail").html(data);
			},
			error: function() {
			}       
        })
    }
     add_to_cart()
        function add_to_cart() {
                    $(document).on('click','.add_cart_pro_detail',function() {
                        var product_id = "<?php echo $_GET['id']?>";
                        var qty = $("#quantity").val();
                        var sel_size = $("#sel_size").val();
                        // alert(productId)
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
                        // $("#empModal").on('hide.bs.modal',function () {
                        //     $("#show_pro").html(data);     
                        // })
                    })
                })
            }
})

</script>