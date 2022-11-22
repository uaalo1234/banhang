
<?php require_once('views/admin/dashboard/index.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php startblock('title') ?>
Product
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">ID</th>
                                            <th width="10%">Product Name</th>
                                            <th width="15%">Category Name</th>
                                            <th width="10%">Brand Name</th>
                                            <th width="5%">Price</th>
                                            <th width="5%">Discount</th>
                                            <th width="15%">Thumbnail</th>
                                            <th width="10%">Description</th>
                                            <th width="5%">Size</th>
                                            <th width="10%">Types</th>


                                            <th width="5%"></th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_pro1">
                                                <!-- ...... -->
                                    </tbody>
                                </table>
                                <div id="wrapper">
                                        <div id="pagination-demo1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php endblock() ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        getPro()
        function getPro(){
                $.get("<?php echo url('admin/product/show_pro') ?>",function (data) {
                    $("#show_pro1").html(data);
                })
        }
        $(document).on('click','.del_product',function (e) {
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
                                        url: '<?php echo url('admin/product/delete_product') ?>',
                                        type:'POST',
                                        data:{id : id},
                                        success:function(response) { 
                                            // document.getElementById(id).style.display="none";
                                            // window.setTimeout(function(){location.reload()},1000);
                                            getPro()
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
