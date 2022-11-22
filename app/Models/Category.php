<?php
require_once('./core/Database.php');
require_once('app/Models/Model.php');


class Category extends Model{

    protected $table = 'category';

    protected $fillable = ['id','categoryName'];

    public function show_category(){ 

        return $this->findAll();
    }

    public function show($id){

        return $this->find($id);
    }

    public function show_category_shop(){ 

        $sql = "SELECT * FROM category ORDER BY id desc LIMIT 6";
        // print_r($sql);die();
        $result = $this->getAll($sql);
        return $result;
    }
    public function web_show_category($id){
        
        $sql = " SELECT category.id,category.categoryName,product.id,product.productName as productName,product.discount,product.price,product.thumbnail,product.description FROM category 
        INNER JOIN product ON category.id = product.categoryId WHERE category.id = '$id'  ";
        // print_r($sql);die();
        $result =  $this->getAll($sql);  
        return $result;
}
public function show_category_index(){ 

    $sql = "SELECT category.*,product.thumbnail FROM category INNER JOIN product ON category.id = product.categoryId GROUP BY category.id ASC LIMIT 6";
    $result = $this->getAll($sql);
    return $result;
}
public function delete_cat($id){
    $sql = "DELETE FROM category WHERE id = $id";
    // print_r($sql);die();    
    $result = $this->dbConnection->query($sql);
    return $result;
}

}

?>