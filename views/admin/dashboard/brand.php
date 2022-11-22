
<?php require_once('views/admin/dashboard/index.php') ?>

<?php startblock('title') ?>
Dashboard
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
                                            <th width="10%">ID</th>
                                            <th width="70%">Brand Name</th>
                                            <th width="10%"></th>
                                            <th width="10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data as $brand) : ?>
                                        <tr id="tr_<?php echo $brand['id'] ?>">
                                            <td><?php echo $brand['id']; ?></td>
                                            <td><?php echo $brand['brandName']; ?></td>
                                            <td><a href="<?php echo url('admin/brand/brandshow/'.$brand['id']) ?>">Edit</a></td>
                                            <td><button type="button" class=" del_brand btn btn-danger" value="<?php echo $brand['id']?>">Delete</a></td>
                                        </tr>
                                        <?php endforeach ;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
<?php endblock() ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.del_brand').on('click',function (e) {
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
                                reverseButtons: true
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?php echo url('admin/brand/delete_brand') ?>',
                                        type:'POST',
                                        data:{id : id},
                                        success:function(response) { 
                                            // document.getElementById(id).style.display="none";
                                            // window.setTimeout(function(){location.reload()},1000);
                                        },
                                    })
                                    swalWithBootstrapButtons.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success',
                                        )
                                        $('#tr_'+id).hide(300);
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