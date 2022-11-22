<?php
require_once ('app/Controllers/Admin/BackendController.php');

require_once('app/Models/OrderDetail.php');
require_once('app/Models/Order.php');

class OrderDetailController extends BackendController
{
    public function show_order_detail_admin(){

        $order_detail = new OrderDetail;
        $order_details = $order_detail->show_order_detail_admin();
        require('views/admin/dashboard/order_detail.php');

    }
    public function update_order_detail(){
        $order_status = $_GET['order_status'];
        $id = $_GET['id'];
        $order_detail_status = new Order;
        $order_detail_status = $order_detail_status->update_order_detail_status($order_status,$id);
        return redirect('admin/orderdetail/show_order_detail_admin');
    }
}