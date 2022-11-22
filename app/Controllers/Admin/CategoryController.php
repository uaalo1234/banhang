<?php 
require_once ('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Category.php');


class CategoryController extends BackendController{

    public function index(){

        $category = new Category();
        $categories = $category->show_category();
        require('views/admin/dashboard/category.php');
    }

    public function insert_category(){

        return $this->view('dashboard/addcategory.php');

    }
    public function add_category(){
        $category = new Category();
        $category = $category->create($_POST);

        return redirect('admin/category/index');
    }
    public function categoryshow(){

        $id = $_GET['id'];
        $category = new Category();
        $category = $category->show($id);
        require('views/admin/dashboard/editcategory.php');

    }
    public function update_category(){
        $id = $_GET['id'];
        $category = new Category();
        $category = $category->update($_POST,$id);
        return redirect('admin/category');
    }

    public function delete_category(){

        $id = $_POST['id'] ;
        $category = new Category();
        $category = $category->delete_cat($id);
        return redirect('admin/category');
    }
}

?>