<?php
require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Category.php');
require_once('app/Models/Brand.php');
require_once('app/Models/Product.php');

class ShopProductController extends WebController
{

    public function s_shop(){
        $category = new Category();
        $categories = $category->show_category_shop();
        $brand = new Brand();
        $brands = $brand->show_brand_shop();
        $data = [
            'categories' => $categories,
            'brands' => $brands,];
        return $this->view('show-product.php',$data);
    }

    public function s_shop_byCat(){
        $category = new Category();
        $categories = $category->show_category_shop();
        $brand = new Brand();
        $brands = $brand->show_brand_shop();
        $data = [
            'categories' => $categories,
            'brands' => $brands,];
        return $this->view('show-product-byCat.php',$data);
    }
    public function show_shop(){
        $product = new Product();
        $products = $product->show_product_web();
        // print_r($products);
        // return $this->view('shop.php',$products);
        require('views/web/shop.php');
        // print_r($data);
        // die();
    }


    public function productbyCategory(){
        
        $id = $_GET['id'];
        $category = new Category();
        $categories = $category->web_show_category($id);
        // print_r($categories);die();
        return $this->view('showProductbyCategory.php',$categories);
    }
    public function productbyBrand(){
        
        $id = $_GET['id'];
        $brand = new Brand();
        $brands = $brand->web_show_brand($id);
        return $this->view('productbyBrand.php',$brands);
    }

    public function show_product_detail(){
        return $this->view('shopdetail.php');
    }
    public function show_pro_detail(){
        $id = $_GET['id'];
        $product = new Product();
        $product = $product->show($id);
        require('views/web/show_pro_detail.php');
    }
        public function show_product_modal(){
            $id = $_POST['id'];
            $product = new Product();
            $product = $product->s_pro_modal($id);
            // print_r($products);
            
            return $this->view('show_pro_modal.php');
            // print_r($data);
            // die();
        }
}