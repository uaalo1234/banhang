<?php include('views/web/layouts/index.php') ?>


<?php startblock('styles') ?>
    <style>
        .cart_total, .cart_price {
            text-align: right;
        }

        .cart_quantity, .cart_menu {
            text-align: center;
        }

        .update-cart {
            display: inline;
        }

    </style>
<?php endblock() ?>

<?php startblock('content')?>
<section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Trang</a></li>
                    <li class="active">Giỏ Hàng Của Bạn</li>
                </ol>
            </div>
                <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="name">Tên sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Thành tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sum = 0;
                        foreach($cartItems as $key => $cartItem): ?>
                            <tr data-id="27">
                                <form action="<?php echo url("cart/modify/$key")?>" method="POST">
                                <td >
                                    <a href=""><img width="100px" height="100px" src="<?php echo asset("storage/{$cartItems[$key]['product']['image']}") ?>" alt=""></a>
                                </td>
                                <td >
                                    <h4><?php echo $cartItems[$key]['product']['name'] ?></h4>
                                    <p>Mã sản phẩm: <?php echo $cartItems[$key]['product']['id']; ?></p>
                                </td>
                                <td class="cart_price">
                                    <p><?php echo number_format($cartItems[$key]['product']['price'], 0, ".", ",")." đ";?></p>
                                </td>
                                <td class="cart_quantity">
                                    <input style="width:30%" type="number" class="form-control quantity update-cart" name="quantity" autocomplete="off" min="1" value="<?php echo $cartItems[$key]['cart_quantity']?>">
                                </td>
                                <td class="cart_total">
                                    <?php 
                                        $cartItemTotalPrice = $cartItems[$key]['product']['price'] * $cartItems[$key]['cart_quantity']; 
                                        $sum += $cartItemTotalPrice;
                                    ?>
                                    <p class="cart_total_price"><?php echo number_format($cartItemTotalPrice, 0, ".", ",") ?> đ</p>
                                </td>
                                <td>
                                    <button name="delete" class="btn btn-danger btn-sm remove-from-cart" type="submit">Delete</button>
                                </td>
                                </form>
                            </tr>
                            <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right"><h3><strong>Tổng tiền:  <?php echo number_format($sum, 0, ".", ",")?> đ  </strong></h3></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">
                                <a href="<?php echo url('homepage/index'); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục xem...</a>
                                <a class="btn btn-success" href="<?php echo url('checkout') ?>">Đặt hàng</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
                    </div>
    </section>
<?php endblock()?>

<?php startblock('scripts')?>
<script>
    $(function() {
        $(".update-cart").keydown(function(e) {
            //disable minus input
            if (e.which === 189) {
                e.preventDefault();
                // e.target.value = "";
                return false;
            }
        });
    });
</script>
<?php endblock()?>