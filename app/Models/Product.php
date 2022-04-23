<?php 

require_once('app/Models/Model.php');

class Product extends Model
{
    protected $table = "products";

    public function formatPrice() 
    {
        return number_format($this->price,0,'.', ',');
    }

    public function getLatestProducts($limit = 5) 
    {
        $sql = "SELECT * FROM products p LIMIT $limit";
        return $this->getAll($sql);
    }

    public function image()
    {
        $sql = "SELECT * FROM product_images WHERE product_id = {$this->id}";
        return $this->getFirst($sql)->get();
    }

    public function images()
    {
        $sql = "SELECT * FROM product_images WHERE product_id = {$this->id}";
        return $this->getAll($sql)->get();
    }
}