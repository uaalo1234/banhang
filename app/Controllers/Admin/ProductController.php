<?php 
require_once ('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Product.php');
require_once('app/Models/Category.php');
require_once('app/Models/Brand.php');
require_once('core/Storage.php');


class ProductController extends BackendController{

    public function index(){

        return $this->view('dashboard/product.php');
    }
    public function show_pro(){
        $product = new Product();
        $products = $product->show_product();
        return $this->view('dashboard/show_product.php',$products);
    }

    public function insert_product(){
        $category = new Category();
        $categories = $category->show_category();
        $brand = new Brand();
        $brands = $brand->show_brand();
        $product = new Product();
        $products = $product->show_product();
        require('views/admin/dashboard/addproduct.php');
    }
    public function add_product(){

        $product = new Product();
        Storage::upload('images',$_FILES['thumbnail']);
        $_POST['thumbnail'] = $_FILES['thumbnail']['name'];
        $product = $product->create($_POST);
        return redirect('admin/product/index');
    }
    public function productshow(){
        
        $id = $_GET['id'];
        $category = new Category();
        $categories = $category->show_category();
        $brand = new Brand();
        $brands = $brand->show_brand();
        $product = new Product();
        $product = $product->show($id);
        require('views/admin/dashboard/editproduct.php');

    }
    public function update_product(){
        $id = $_GET['id'];
        $product = new Product();
        Storage::upload('images',$_FILES['thumbnail']);
        $_POST['thumbnail'] = $_FILES['thumbnail']['name'];
        $product = $product->update($_POST,$id);
        return redirect('admin/product');
    }

    public function delete_product(){

        $id = $_POST['id'] ;
        $product = new Product();
        $product = $product->del_product($id);
        return redirect('admin/product');
    }
}

?>