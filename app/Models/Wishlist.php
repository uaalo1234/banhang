<?php
require_once('./core/Database.php');
require_once('app/Models/Model.php');
require_once('core/Auth.php');

class Wishlist extends Model{

    protected $table = 'wishlist';

    protected $fillable = ['id','productId','userId'];
    public function show_wishlist($id){
        $sql = "SELECT wishlist.id,wishlist.productId,product.thumbnail,product.productName,product.price,wishlist.userId 
        FROM wishlist INNER JOIN product ON wishlist.productId = product.id WHERE wishlist.userId = $id ";
        // print_r($sql);die();
        return $this->getAll($sql);
        // return $this->dbConnection->query($sql);
 
    }
    public function add_to_wishlist($productId,$userId)
    {
        $sql = "INSERT INTO wishlist(productId,userId) VALUES ('$productId','$userId')";
        // print_r($sql);die();
        return $this->dbConnection->query($sql);
    }

    public function delete_wishlist($id){
        $sql = "DELETE FROM wishlist WHERE id = $id";
        // print_r($sql);die();    
        $result = $this->dbConnection->query($sql);
        return $result;
    }
}