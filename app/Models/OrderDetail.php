<?php
require_once('./core/Database.php');
require_once('app/Models/Model.php');

class OrderDetail extends Model{

    protected $table = 'order_detail';

    protected $fillable = ['orderId','quantity','price','productId','discount','size'];


    public function order_detail($productId,$quantity,$price,$orderId,$discount,$size)
    {
        $sql = "INSERT INTO order_detail(productId,quantity,price,orderId,discount,size) VALUES ('$productId','$quantity','$price','$orderId','$discount','$size')";
        return $this->dbConnection->query($sql);
    }

    public function show_order_detail($id){

        $sql = "SELECT order_detail.id,order_detail.orderId,order_detail.quantity,order_detail.price,orders.userId,
        orders.fullname,orders.phone_number,orders.address,orders.order_status,order_detail.size,
        orders.order_date,product.productName,product.thumbnail,product.discount
        FROM order_detail INNER JOIN orders ON order_detail.orderId = orders.id 
        INNER JOIN product ON order_detail.productId = product.id WHERE orders.userId = '$id'";
        // print_r($sql);die();
      
        return $this->dbConnection->query($sql);
    }
    public function show_order_detail_admin(){

        $sql = "SELECT order_detail.id,order_detail.orderId,order_detail.quantity,order_detail.price,
        orders.userId,orders.fullname,orders.phone_number,orders.address,
        orders.order_status,orders.order_date,product.productName,product.thumbnail 
        FROM order_detail INNER JOIN orders ON order_detail.orderId = orders.id 
        INNER JOIN product ON order_detail.productId = product.id";
        // print_r($sql);die();
        $result = $this->getAll($sql);
        return $result;
    }
    public function s_chart(){
        
        $sql = "SELECT DATE_FORMAT(created_at ,'%e-%m') as 'ngay', sum(price) as 'doanh_thu' 
        FROM order_detail WHERE DATE(created_at) >= CURDATE() - INTERVAL 7 DAY GROUP BY DATE_FORMAT(created_at,'%d-%m')";
        // echo($sql);die();
        return $this->dbConnection->query($sql);
    }
    public function s_chart1(){
        
        $sql = "SELECT DATE_FORMAT(created_at ,'%e-%m') as 'ngay', sum(price) as 'doanh_thu' 
        FROM order_detail WHERE DATE(created_at) >= CURDATE() - INTERVAL 30 DAY GROUP BY DATE_FORMAT(created_at,'%d-%m')";
        // echo($sql);die();
        return $this->dbConnection->query($sql);
    }

}