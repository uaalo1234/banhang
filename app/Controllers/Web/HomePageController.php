<?php
require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Product.php');
require_once('app/Models/Category.php');


class HomepageController extends WebController
{
    public function index()
    {
        $product = new Product();
        $products = $product->show_featured();
        return $this->view('index.php',$products);
    }
    public function show_feat(){
        $product = new Product();
        $products = $product->show_featured();
        return $this->view('featured.php',$products);
        // require('views/web/featured.php');
    }
    public function show_cat(){
        $category = new Category();
        $categories = $category->show_category_index();
        return $this->view('cat_index.php',$categories);
        // require('views/web/featured.php');
    }
    public function show_about(){
        return $this->view('about.php');
    }
    public function show_service(){
        return $this->view('service.php');
    }

   
}
