<?php
require_once('./core/Database.php');
require_once('app/Models/Model.php');


class Cart extends Model{

    protected $table = 'cart';

    protected $fillable = ['id','productId','quantity','size'];

    public function show_cart(){ 

        $sql = "SELECT cart.id,cart.size,cart.quantity,productId,product.productName,product.price,product.thumbnail,product.description,product.discount  
        FROM cart INNER JOIN product ON cart.productId = product.id";
        return $this->getAll($sql);
    }
    public function show($id){


        $sql = "SELECT cart.id,cart.quantity,product.id,product.productName,product.price,product.thumbnail,product.description,product.types 
        FROM cart INNER JOIN product ON cart.productId = product.id WHERE cart.id = $id";
   
        return $this->getAll($sql);
    }
    public function delete_cart($id){
        $sql = "DELETE FROM cart WHERE id = $id";
        // print_r($sql);die();    
        $result = $this->dbConnection->query($sql);
        return $result;
    }
    public function update($id,$quantity)
    {
        $sql = "UPDATE cart SET quantity = $quantity WHERE id = $id ";

        // print_r($sql);die();
       $result = $this->dbConnection->query($sql);
        return $result;
    }

    public function delete_cart_detail($id){
        $sql = "DELETE FROM cart WHERE id = $id";
        // print_r($sql);die();    
        $result = $this->dbConnection->query($sql);
        return $result;
    }
    // public function insert_cart($productId,$quantity,$size){ 
    //     $sql = "INSERT INTO cart(productId,quantity,size) VALUES ('$productId','$quantity','$size')";
    //     return $this->dbConnection->query($sql);
    // }

    public function add_cart($product_id,$qty,$sel_size){
       
        $sql = "INSERT INTO cart(productId,quantity,size) VALUES ('$product_id','$qty','$sel_size')";
        // print_r($sql);die();
        $result = $this->dbConnection->query($sql);
        return $result;
    }
}