<?php include_once('views/web/layouts/index.php') ?>

<?php startblock('content')?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Trang</a></li>
                <li class="active">Thanh toán</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Nhập địa chỉ nhận hàng</h2>
            <form id="form-order-info">
                <input type="hidden" name="_token" value="ytUXCOSai5JuMpPF64LgVyl926VP2AUiyyDylpVG">                <div class="row">
                    <input type="hidden" name="total_price">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label style="font-weight:bolder;color:black">Họ và tên<span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="name" placeholder="Tên người nhận">
                            <div class="invalid-feedback text-danger" id="errorName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:bolder;color:black">Số điện thoại<span class="text-danger">*</span>  </label>
                            <input type="number" class="form-control" name="phone_number" placeholder="SĐT người nhận">
                            <div class="invalid-feedback text-danger" id="errorPhonenumber">
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:bolder;color:black">Email<span class="text-danger">*</span>  </label>
                            <input type="text" class="form-control" name="email" placeholder="Email của người nhận hàng">
                            <div class="invalid-feedback text-danger" id="errorEmail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:bolder;color:black">Ghi chú<span class="text-danger">*</span>  </label>
                            <textarea type="text" rows="4" class="form-control" name="note" placeholder="Bạn muốn giao hàng lúc nào?"></textarea>
                            <div class="invalid-feedback text-danger" id="errorNote">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Tỉnh / Thành phố<span class="text-danger">*</span></label>
                            <select class="form-control" name="province" id="provinces" required="">
                                <option value="-1">-- Chọn một --</option>
                                <?php foreach($cities as $city): ?>
                                    <option value="<?php echo $city->matp ?>"><?php echo $city->name; ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback text-danger" id="errorProvince">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Quận / Huyện<span class="text-danger">*</span></label>
                            <select class="form-control" name="district" id="districts" required="">
                                <option value="-1" selected="selected">-- Chọn một --</option>
                            </select>
                            <div class="invalid-feedback text-danger" id="errorDistrict">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Xã / Phường<span class="text-danger">*</span></label>
                            <select class="form-control" name="ward" id="wards" required="">
                                <option value="-1" selected="selected">-- Chọn một --</option>
                            </select>
                            <div class="invalid-feedback text-danger" id="errorWard">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Cụ thể<span class="text-danger">*</span></label>
                            <textarea class="form-control" type="text" name="detailsAddress" rows="4" placeholder="Số nhà, tên đường, ..." required=""></textarea>
                            <div class="invalid-feedback text-danger" id="errorDetails">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        
        <div class="review-payment">
            <h2>Kiểm tra và Thanh toán</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="description"></td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    
                <?php 
                        $sum = 0;
                        foreach($cartItems as $key => $cartItem): ?>
                            <tr data-id="27">
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
                                    <?php echo $cartItems[$key]['cart_quantity']?>
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
                            </tr>
                        <?php endforeach ?>
                                
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                        <table class="table table-condensed total-result">
                            <tbody><tr>
                                <td>Tổng tiền</td>
                                <td class="text-right"><?php echo number_format($sum,0); ?>đ</td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td class="text-right"><?php echo number_format($sum * 0.1, 0); ?>đ</td>
                            </tr>
                            <tr>
                                <td><label>Thanh toán</label></td>
                                <td class="text-right"><span><?php echo number_format($sum + $sum * 0.1, 0)?>đ</span></td>
                                <input type="hidden" id="total_price" value="440000">
                            </tr>
                            <tr>
                                <td><label>Hình thức thanh toán</label></td>
                            </tr>
                            
                        </tbody></table>
                        <select class="form-control" name="payment" required="">
                                <option value="cod" selected="">
                                    Thanh toán khi nhận hàng (COD)
                                </option>
                                <option value="online">
                                    Thanh toán cổng thanh toán online
                                </option>
                            </select>
                        <hr>
                        <div class="text-right">
                                <a id="btn_order" class="btn btn-warning">Đặt hàng</a>
                            </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php endblock() ?>

<?php startblock('scripts')?>

<script>
    $(document).ready(function(){
        $(document).on('change', '#provinces', function() {
            // $("#errorProvince").text("")
            // console.log('123123')
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "<?php echo url("checkout/districts");?>",
                data: { matp: $('#provinces').find(":selected").val() },
                success: function(result) {
                    $('#districts').empty()
                    $('#districts').prepend(`<option value="-1" selected="selected">Chọn ...</option>`)
                    $('#wards').empty()
                    $('#wards').prepend(`<option value="-1" selected="selected">Chọn ...</option>`)
                    if (result.status) {
                        Object.values(result.data.districts).forEach(key => {
                            $('#districts').append(`
                                <option value="${key.id}">${key.name}</option>
                            `)
                        })
                    }
                    else {
                        //toastr.error('Không thể tải lên dữ liệu vị trí, hãy thử lại')
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })

        $(document).on('change', '#districts', function() {
            $("#errorDistrict").text("")

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '<?php echo url('checkout/wards'); ?>',
                data: { 
                    maqh: $('#districts').find(":selected").val()
                },
                success: function(result) {
                    $('#wards').empty()
                    $('#wards').prepend(`<option value="-1" selected="selected">Chọn ...</option>`)
                    
                    if (result.status) {
                        Object.values(result.data.wards).forEach(key => {
                            $('#wards').append(`
                                <option value="${key.id}">${key.name}</option>
                            `)
                        })
                    }
                    else {
                        toastr.error('Không thể tải lên dữ liệu vị trí, hãy thửu lại')
                    }
                },
                error: function(err) {
                    console.err(err)
                }
            })
        })

        $(document).on('change','#wards', function() {
            $("#errorWard").text("")
        })
        $(document).on('keydown', '[name="detailsAddress"]',function() {
            $("#errorDetails").text("")
        })
        $(document).on('keydown', '[name="name"]',function() {
            $("#errorName").text("")
        })
        $(document).on('keydown', '[name="email"]',function() {
            $("#errorEmail").text("")
        })
        $(document).on('keydown', '[name="phone_number"]',function() {
            $("#errorPhonenumber").text("")
        })
        $(document).on('keydown', '[name="note"]',function() {
            $("#errorNote").text("")
        })

    });
</script>
<?php endblock()?>