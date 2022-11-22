<div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">Full Name</th>
                                            <th width="10%">Phone Number</th>
                                            <th width="15%">Address</th>
                                            <th width="10%">Product Name</th>
                                            <th width="5%">Thumbnail</th>
                                            <th width="5%">Quantity</th>
                                            <th width="5%">Size</th>
                                            <th width="15%">Price</th>
                                            <th width="10%">Order Date</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Remove</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($order_details as $order_detail) : ?>
                                        <tr id="tr_<?php echo $order_detail['id'] ?>">

                                            <td><?php echo $order_detail['fullname']; ?></td>
                                            <td><?php echo $order_detail['phone_number']; ?></td>
                                            <td><?php echo $order_detail['address']; ?></td>
                                            <td><?php echo $order_detail['productName']; ?></td>
                                            <td><img src="<?php echo asset('storage/images/'.$order_detail['thumbnail'])?>" width="50px"></td>
                                            <td><?php echo $order_detail['quantity']; ?></td>
                                            <td><?php echo $order_detail['size']; ?></td>
                                            <td><?php echo $order_detail['price']; ?> <?php echo "("." Đã giảm : ".$order_detail['discount']."%"." )" ?></td>
                                            <td><?php echo $order_detail['order_date']; ?></td>

                                            <td><?php if($order_detail['order_status'] == 0){
                                                echo "Pendding";
                                            }if($order_detail['order_status'] == 1)
                                            {
                                                echo "Complete";
                                            }
                                            if($order_detail['order_status'] == 2)
                                            {
                                                echo "Reject";
                                            }
                                            ?></td>
                                            <?php if($order_detail['order_status'] == 2){?>
                                            <td class="remove-pr">
                                               
									            <div  class="del_order_detail fas fa-times" value="<?php echo $order_detail['id'] ?>" ></div>
								                    </a>
                                            </td>
                                            <?php }else{?>
                                                <td class="remove-pr">
                                                 N/A
                                            </td>
                                                <?php }?>
                                        </tr>   

                                        <?php endforeach ;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>