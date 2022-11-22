
<?php require_once('views/admin/dashboard/index.php') ?>
<?php require_once ('app/Controllers/Admin/CategoryController.php');?>

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
                                <form action="<?php echo url('admin/category/update_category/'.$category['id']) ?>" method="POST" >	
                        <tr>
                            <td>
                                <input type="text" name="categoryName" value="<?php echo $category['categoryName'] ?>"  class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <button type="submit" name="submit" Value="Update">Update</button>
                            </td>
                        </tr>
                    </form>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
<?php endblock() ?>
