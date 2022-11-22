<?php require_once('app/Controllers/Web/WebController.php'); 
require_once('app/Models/Cart.php');
require_once('app/Models/Product.php');
require_once ('core/Auth.php');
class CartController extends WebController
{
    public function s_cart(){

        require('views/web/s-cart.php');
    }

    public function show_cart(){
        
        $cart = new Cart();
        $carts = $cart->show_cart();
        require('views/web/cart.php');
    }

    public function add_to_cart(){
        if(Auth::getUser('user')){
        $cart1 = new Cart();
        $productId = $_POST['productId'];
        // $quantity = $_POST['quantity'];
        // $size = $_POST['size'];
        $carts1 = $cart1->show_cart(Auth::getUser('user')['id']);
        foreach($carts1 as $cart1){
            if($cart1['productId'] == $productId){
                exit();
            }else{
                continue;
            }
        }
        $cart = new Cart();
        $cart = $cart->create($_POST);
        // return redirect('homepage');
    }
}

    
    public function delete_cart(){

        $id = $_POST['id'];
        $cart = new Cart();
        $cart = $cart->delete_cart($id);
      return redirect('cart/show_cart');
    }

    public function updateQuantity() {
        $id = $_POST['id'];
        $quantity = $_POST['quantity']; 
        $cart = new Cart;
        $cart = $cart->update($id,$quantity);
        // print_r($sql);die();
        require('views/web/s-cart.php');
    }
    public function add_cart_1(){
        $cart1 = new Cart();
        $carts1 = $cart1->show_cart();
        $product_id = $_POST['productId'];
        $qty = $_POST['quantity'];
        $sel_size = $_POST['size'];
        $carts1 = $cart1->show_cart(Auth::getUser('user')['id']);
        foreach($carts1 as $cart1){
            if($cart1['productId'] == $product_id && $cart1['size'] == $sel_size){
                require('views/web/cart.php');
                exit();
             }else{
                 continue;
            }
            }
        $cart = new Cart();
        $cart = $cart->add_cart($product_id,$qty,$sel_size);
}
}