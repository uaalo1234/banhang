<?php
require_once('./core/Database.php');
require_once('app/Models/Model.php');


class Product extends Model{

    protected $table = 'product';

    protected $fillable = ['id','productName','price','discount','thumbnail','description','brandId','categoryId','types','size'];

    public function show_product(){ 
        $sql = "SELECT product.*,category.categoryName,brand.brandName 
        FROM product INNER JOIN category ON product.categoryId = category.id
        INNER JOIN brand ON product.brandId = brand.id ORDER BY product.id DESC";
        return $this->getAll($sql);
    }
    public function show_product_web(){ 
      
        // $soPro1trang = 3;
        // if(isset($_GET['trang'])){
        //     $trang = $_GET['trang'];
        // }else{
        //     $trang= 1 ;
        // }
        // echo $trang;
        // $from1 = ( $trang - 1 ) *  $soPro1trang;
        $sql = "SELECT product.*,category.categoryName,brand.brandName 
        FROM product INNER JOIN category ON product.categoryId = category.id
        INNER JOIN brand ON product.brandId = brand.id ORDER BY product.id ASC";
        // print_r($sql);die();
        $result = $this->getAll($sql);
        return $result;
    }

    public function show($id){

        $sql = "SELECT product.*,category.categoryName,brand.brandName 
         FROM product INNER JOIN category ON product.categoryId = category.id
        INNER JOIN brand ON product.brandId = brand.id WHERE product.id = $id ";
        // print_r($sql);die();
        $result = $this->getFirst($sql);
        return $result;
    }
    public function show_featured(){

    $sql = "SELECT * FROM  product WHERE types = '0' LIMIT 4";
    // print_r($sql);die();
    $result =  $this->getAll($sql);
    return $result;  
}  
public function del_product($id){
    $sql = "DELETE FROM product WHERE id = $id";
    // print_r($sql);die();    
    $result = $this->dbConnection->query($sql);
    return $result;
}
public function s_pro_modal($id){
    $sql = "SELECT * FROM product WHERE product.id = $id ";
    $result = $this->getFirst($sql);
    return $result;
}

}

?>