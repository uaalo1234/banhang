<?php require_once('views/admin/dashboard/index.php') ?>

<?php startblock('content') ?>

<div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">OrderID</th>
                                            <th width="10%">Full Name</th>
                                            <th width="10%">Phone Number</th>
                                            <th width="20%">Address</th>
                                            <th width="5%">Product Name</th>
                                            <th width="5%">Thumbnail</th>
                                            <th width="5%">Quantity</th>
                                            <th width="5%">Price</th>
                                            <th width="10%">Order Date</th>
                                            <th width="10%">Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($order_details as $order_detail) : ?>
                                        <tr>
                                            <td><?php echo $order_detail['orderId']; ?></td>
                                            <td><?php echo $order_detail['fullname']; ?></td>
                                            <td><?php echo $order_detail['phone_number']; ?></td>
                                            <td><?php echo $order_detail['address']; ?></td>
                                            <td><?php echo $order_detail['productName']; ?></td>
                                            <td><img src="<?php echo asset('storage/images/'.$order_detail['thumbnail'])?>" width="50px"></td>
                                            <td><?php echo $order_detail['quantity']; ?></td>
                                            <td><?php echo $order_detail['price']; ?></td>
                                            <td><?php echo $order_detail['order_date']; ?></td>

                                            <td class="status" id="status"><?php if($order_detail['order_status'] == 0){
                                                echo "Pendding";
                                            }if($order_detail['order_status'] == 1)
                                            {
                                                echo "Complete";
                                            }
                                            if($order_detail['order_status'] == 2)
                                            {
                                                echo "Reject";
                                            }
                                            ?>
                                            </td>
                                            <td>
                                                <select  onchange="update_status(this.options[this.selectedIndex].value,<?php echo $order_detail['orderId']?>)">
                                                    <option >Status</option>
                                                    <option value="0">Pendding</option>
                                                    <option value="1">Complete</option>
                                                    <option value="2">Reject</option>
                                                </select>
                                            </td>
                                        </tr>   
                                        <?php endforeach ;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

<script>
    function update_status(value,orderId){
        // alert(orderId);
        let url = "<?php echo url('admin/orderdetail/update_order_detail') ?>";
        window.location.href=url+"?id="+orderId+"&order_status="+value;
    }
</script>
<?php endblock() ?>
