<?php
require_once('./core/Database.php');
require_once('app/Models/Model.php');

class Order extends Model{

    protected $table = 'orders';

    protected $fillable = ['id','userId','payment_method','shipping_method','fullname','email','phone_number','address','note','order_status'];

    public function update_order_detail_status($order_status,$id){
        
        $sql = "UPDATE orders SET order_status = '$order_status' WHERE id = '$id' " ;
        return $this->dbConnection->query($sql);
    }
}