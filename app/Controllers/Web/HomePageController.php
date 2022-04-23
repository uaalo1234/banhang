<?php 

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Product.php');

class HomePageController extends WebController
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function index()
    {
        $products = $this->product->getLatestProducts(5)->hydrate();
        return $this->view('homepage/index.php', ['products' => $products]);
    }
}