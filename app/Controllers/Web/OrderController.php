<?php
require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Order.php');
require_once('app/Models/Cart.php');
require_once('app/Models/OrderDetail.php');
require_once('core/Auth.php');

class OrderController extends WebController
{
    // public function create(){
    //     $order = new Order();
    //     $order = $order->create($_POST);   
    // }

    public function handleOrder()
    {   
            $order = new Order;
            // print_r($_POST);die();
            $order = $order->create($_POST);
            $cart = new Cart;
            $carts = $cart->show_cart();
            foreach($carts as $cart) {
                $order_detail = new OrderDetail;
                $orderId = $order['id'];
                $quantity = $cart['quantity'];
                $productId = $cart['productId'];
                $discount = $cart['discount'];
                $size = $cart['size'];
                if($order['shipping_method']=='0'){
                    $price = ($cart['price'] * $quantity * 1.1) - ($cart['price'] * $quantity * ($discount / 100));
      
                }else{
                    $price = ($cart['price'] * $quantity * 1.1) - ($cart['price'] * $quantity * ($discount / 100)) + 10;
                }
                $order_detail = $order_detail->order_detail($productId, $quantity, $price, $orderId,$discount,$size);
                $delete_cart_detail = new Cart;
                $delete_cart_detail = $delete_cart_detail->delete_cart_detail($cart['id']);
            }
            require('views/web/order_success.php');
            }

}