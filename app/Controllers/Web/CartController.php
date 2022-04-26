<?php 

require_once('app/Controllers/Web/WebController.php');
require_once('app/Middlewares/Authenticated.php');
require_once('app/Models/Cart.php');

class CartController extends WebController
{
    protected $cart; 

    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function add()
    {
        $this->middleware('Authenticated');
        $id = $_GET['id'];
        // print_r($id);die();
        $this->cart->addCartItem($id);
        return redirect('cart/index');
    }

    public function index()
    {
        $this->middleware('Authenticated');
        $cartItems = $this->cart->getCartItems();
        return $this->view('cart/index.php', ['cartItems' => $cartItems]);
    }

    public function modify()
    {
        if (isset($_POST['update'])) {
            $this->update($_GET['id'], $_POST['quantity']);
        }

        if (isset($_POST['delete'])) {
            $this->delete($_GET['id']);
        }
    }

    public function update($id, $quantity)
    {
        $this->cart->updateCartItem($id, $quantity);
        return redirect('cart/index');
    }

    public function delete($id)
    {
        $this->cart->deleteCartItem($id);
        return redirect('cart/index');
    }
}