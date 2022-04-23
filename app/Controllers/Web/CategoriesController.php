<?php 

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Category.php');
require_once('app/Models/Product.php');

class CategoriesController extends WebController
{
    private $product;
    private $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function showProducts()
    {
        $slug = $_GET['slug'];
        $foundCategory = $this->category->where(['slug' => $slug])->first();
        $products = $this->product->where(['category_id' => $foundCategory['id']])->hydrate();
        return $this->view('categories/show-product.php', ['products' => $products]);
    }
}