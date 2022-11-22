<?php foreach($data as $product) : ?>
                                        <tr id="tr_<?php echo $product['id']?>">
                                                
                                            <td><?php echo $product['id']; ?></td>
                                            <td><?php echo $product['productName']; ?></td>
                                            <td><?php echo $product['categoryName']; ?></td>
                                            <td><?php echo $product['brandName']; ?></td>
                                            <td><?php echo $product['price']; ?></td>
                                            <td><?php echo "-".$product['discount']."%"; ?></td>
                                            <td><img src="<?php echo asset('storage/images/'.$product['thumbnail'])?>" width="50px" height="50px"></td>
                                            <td><?php echo $product['description']; ?></td>
                                            <td><?php echo $product['size']; ?></td>
                                            <td><?php echo $product['types']; ?></td>
                                            <td><a class="btn btn-primary" href="<?php echo url('admin/product/productshow/'.$product['id']) ?>">Edit</a></td>
                                            <td><button type="button" class=" del_product btn btn-danger" value="<?php echo $product['id']?>">Delete</button></td>
                                        </tr>

                                        <?php endforeach ;?>