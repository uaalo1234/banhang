
<?php require_once('views/admin/dashboard/index.php') ?>

<?php startblock('title') ?>Feed back
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
                                            <th width="5%">UserID</th>
                                            <th width="10%">Full Name</th>
                                            <th width="15%">Email</th>
                                            <th width="10%">Phone Number</th>
                                            <th width="25%">Feed Back</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($feedbacks as $feedback) : ?>
                                        <tr>

                                            <td><?php echo $feedback['userId']; ?></td>
                                            <td><?php echo $feedback['fullname']; ?></td>
                                            <td><?php echo $feedback['email']; ?></td>
                                            <td><?php echo $feedback['phone_number']; ?></td>
                                            <td><?php echo $feedback['note']; ?></td>
                                        </tr>
                                        <?php endforeach ;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
<?php endblock() ?>
