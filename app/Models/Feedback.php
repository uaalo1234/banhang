<?php
require_once('./core/Database.php');
require_once('app/Models/Model.php');


class Feedback extends Model{

    protected $table = 'feedback';

    protected $fillable = ['id','fullname','userId','email','phone_number','note'];

  
}