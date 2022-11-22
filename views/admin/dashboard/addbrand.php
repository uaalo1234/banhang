
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
                                <form action="<?php echo url('admin/brand/add_brand') ?>" method="POST" >	
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Enter brand..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </form>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
<?php endblock() ?>
