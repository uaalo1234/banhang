<?php 

require_once('app/Controllers/Web/WebController.php');
require_once('app/Middlewares/Authenticated.php');

class CartController extends WebController
{
    public function add()
    {
        $this->middleware('Authenticated');
        return $this->view('cart/index.php');
    }
}