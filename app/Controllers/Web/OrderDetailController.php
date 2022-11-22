<?php
require_once('app/Controllers/Web/WebController.php');

require_once('app/Models/OrderDetail.php');
require_once('core/Auth.php');

class OrderDetailController extends WebController
{
    
    public function show_detail(){
        $order_detail = new OrderDetail;
        $order_details = $order_detail->show_order_detail(Auth::getUser('user')['id']);

        require('views/web/show_order_detail.php');
    }
    public function show_order_detail(){
        if(Auth::getUser('user')){
        $order_detail = new OrderDetail;
        $order_details = $order_detail->show_order_detail(Auth::getUser('user')['id']);

        require('views/web/order-detail.php');
    }
    }
    public function delete_order_detail(){
        $id = $_POST['id'];
        $order_detail = new OrderDetail;
        $order_detail = $order_detail->delete($id);
        return redirect('orderdetail/show_order_detail');
    }

    public function show_chart(){

        $max_date= $_GET['days'];
        $chart = new OrderDetail;
        $result = $chart->s_chart1($_GET['days']);
        $arr = [];
        $today = date('d');
        if($today < $max_date){
            $get_day_last_month = $max_date - $today;
            $last_month = date('m',strtotime("-1 month"));
            $last_month_date = date('Y-m-d', strtotime("-1 month"));
            $max_day_last_month = (new DateTime($last_month_date))->format('t');
            $start_day_last_month = $max_day_last_month - $get_day_last_month;

            for($i = $start_day_last_month; $i<= $max_day_last_month;$i++)
            {
                $key = $i."-".$last_month;
                $arr[$key] = 0;
            } 
            $start_date_this_month = 1;
        }else{
            $start_date_this_month = $today - $max_date;
        }
        $this_month = date('m');
        for($i=$start_date_this_month;$i<=$today;$i++){
            $key = $i."-".$this_month;
            $arr[$key]=0;
        }
        foreach($result as $chart){
            $arr[$chart['ngay']]=$chart['doanh_thu'];
        }
       echo json_encode($arr);
        
    }
    public function show_chart1(){

        $max_date= $_GET['days'];
        $chart = new OrderDetail;
        $result = $chart->s_chart($_GET['days']);
        $arr = [];
        $today = date('d');
        if($today < $max_date){
            $get_day_last_month = $max_date - $today;
            $last_month = date('m',strtotime("-1 month"));
            $last_month_date = date('Y-m-d', strtotime("-1 month"));
            $max_day_last_month = (new DateTime($last_month_date))->format('t');
            $start_day_last_month = $max_day_last_month - $get_day_last_month;

            for($i = $start_day_last_month; $i<= $max_day_last_month;$i++)
            {
                $key = $i."-".$last_month;
                $arr[$key] = 0;
            } 
            $start_date_this_month = 1;
        }else{
            $start_date_this_month = $today - $max_date;
        }
        $this_month = date('m');
        for($i=$start_date_this_month;$i<=$today;$i++){
            $key = $i."-".$this_month;
            $arr[$key]=0;
        }
        foreach($result as $chart){
            $arr[$chart['ngay']]=$chart['doanh_thu'];
        }
       echo json_encode($arr);
        
    }
}