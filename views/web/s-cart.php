<?php require_once('views/web/layouts/index.php'); ?>
<?php require_once('core/Auth.php'); ?> 
<?php require_once('app/Models/Cart.php'); ?>

<?php startblock('content') ?>
<main id="shop_pro_cart">
......
</main>


<?php endblock() ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function(){
            get()
        function get() {
        $.get("<?php echo url('cart/show_cart') ?>",function (data) {
            $("#shop_pro_cart").html(data);
        })  
    }
        // $(function() {
	$(document).on('click','.btn-primary',function() {
		var key = $(this).attr('data')
		var id = $('#id_' + key).val()
		var quantity = $('#quantity_' + key).val()
		console.log(quantity)
		if($(this).hasClass('increase'))
		{
			$('#quantity_' + key).val(parseInt(quantity) + 1)
			updateQuantity(id,parseInt(quantity) + 1)
		}
		else if(quantity>0) {
		if($(this).hasClass('discount'))
		{
			$('#quantity_' + key).val(parseInt(quantity) - 1)
			updateQuantity(id,parseInt(quantity) - 1)
		}}
	})
// })

$(document).on('change','.change',function() {
		var key = $(this).attr('data')
		var id = $('#id_' + key).val()
		var quantity = $('#quantity_' + key).val()

		if(quantity >= 0) {
		updateQuantity(id,quantity)
		} else {
			quantity = 1
			updateQuantity(id,quantity)
		}
	})

function updateQuantity(id,quantity) {
	$.ajax({
			method : 'POST',
			url: '<?php echo url('cart/updateQuantity')?>',
			data: {id,quantity},
			success: function(data) {
				// location.reload()
				// $("#shop_pro_cart").html(data);
                get();
			},
			error: function() {
		
			}       
			})
				return false;
}

	$(document).on('click','.del_cart',function (e) {
            e.preventDefault();
            var id = $(this).val();
            // alert (id);           
                    const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                    cancelButton: 'btn btn-danger'
                                },
                                buttonsStyling: false
                                })
                                swalWithBootstrapButtons.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes, delete it!',
                                cancelButtonText: 'No, cancel!',
                                reverseButtons: true,
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?php echo url('cart/delete_cart') ?>',
                                        type:'POST',
                                        data:{id : id},
                                        success:function() { 
                                            // document.getElementById(id).style.display="none";
                                            // window.setTimeout(function(){location.reload()},1000);
                                            // $("#shop_pro_cart").append(data);
                                            get();

                                        },
                                    })
                                    swalWithBootstrapButtons.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success',
                                        )
                                     $('#tr_'+id).hide(400);
                                } else if (
                                    /* Read more about handling dismissals below */
                                    result.dismiss === Swal.DismissReason.cancel
                                ) {
                                    swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                    )
                                }
                            })      
            return false;
        }) 


    })
   
</script>