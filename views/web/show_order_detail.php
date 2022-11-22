<?php require_once('views/web/layouts/index.php'); ?>


<?php startblock('content') ?>

<div id="show_order_detail">
    .....
</div>
<?php endblock(); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        getOrderDetail()
        function getOrderDetail() {
        $.get("<?php echo url('orderdetail/show_order_detail') ?>",function (data) {
            $("#show_order_detail").html(data);
        }) 
        $(document).on('click','.del_order_detail',function (e) {
            e.preventDefault();
            var id = $(this).attr("value");
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
                                        url: '<?php echo url('orderdetail/delete_order_detail') ?>',
                                        type:'POST',
                                        data:{id : id},
                                        success:function() { 
                                            // document.getElementById(id).style.display="none";
                                            // window.setTimeout(function(){location.reload()},1000);
                                            getOrderDetail();
                                        },
                                    })
                                    swalWithBootstrapButtons.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success',
                                        )
                                     $('#tr_'+id).hide(500);
                                    
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
    }  
    })
</script>