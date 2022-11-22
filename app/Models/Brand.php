<?php
require_once('./core/Database.php');
require_once('app/Models/Model.php');


class Brand extends Model{

    protected $table = 'brand';

    protected $fillable = ['id','brandName'];

    public function show_brand(){ 

        return $this->findAll();
    }

    public function show($id){

        return $this->find($id);
    }
    public function show_brand_shop(){ 

        $sql = "SELECT * FROM brand ORDER BY id desc";
        $result = $this->getAll($sql);
        return $result;
    }
    public function web_show_brand($id){
        
        $sql = " SELECT brand.id,brand.brandName,product.id,product.productName as productName,product.discount,product.price,product.thumbnail,product.description FROM brand 
        INNER JOIN product ON brand.id = product.brandId WHERE brand.id = '$id'  ";
        $result =  $this->getAll($sql);  
        return $result;
    }
    public function del_brand($id){
        $sql = "DELETE FROM brand WHERE id = $id";
        // print_r($sql);die();    
        $result = $this->dbConnection->query($sql);
        return $result;
    }


}

?>