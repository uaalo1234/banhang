<?php 
require_once ('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Brand.php');


class BrandController extends BackendController{

    public function index(){

        $brand = new Brand();
        $brands = $brand->show_brand(); 
        return $this->view('dashboard/brand.php',$brands);
    }

    public function insert_brand(){

        return $this->view('dashboard/addbrand.php');

    }
    public function add_brand(){
        $brand = new Brand();
        $brand = $brand->create($_POST);
        return redirect('admin/brand/index');
    }
    public function brandshow(){

        $id = $_GET['id'];
        $brand = new Brand();
        $brand = $brand->show($id);
        require('views/admin/dashboard/editbrand.php');

    }
    public function update_brand(){
        $id = $_GET['id'];
        $brand = new Brand();
        $brand = $brand->update($_POST,$id);
        return redirect('admin/brand');
    }

    public function delete_brand(){

        $id = $_POST['id'] ;
        $brand = new Brand();
        $brand = $brand->del_brand($id);
        return redirect('admin/brand');
    }
}
?>