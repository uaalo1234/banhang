<?php 
require_once ('app/Controllers/Admin/BackendController.php');


class DashboardController extends BackendController{


    public function index(){
        return $this->view('dashboard/dashboard.php');
    }
    public function show_dash(){
        return $this->view('dashboard/show_dashboard.php');
    }
}
?>