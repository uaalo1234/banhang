<?php
require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Cart.php');
require_once('app/Models/Users.php');
class CheckoutController extends WebController
{
    public function show_checkout(){

        $cart = new cart();
        $carts = $cart->show_cart();
        require('views/web/checkout.php');
    }
}