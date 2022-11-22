<?php
require_once('app/Models/Model.php');

class Users extends Model{

    protected $table = 'users';

    protected $fillable = ['id','role_id','fullname','password','address','phone_number','email'];

    public function authenticate($data){

        $email = $data['email'];
        $password = $data['password'];
        $sql = "SELECT * FROM Users WHERE email = '$email' AND password = md5('$password') ";
        return $this->getFirst($sql);
    }
    public function show_user(){
        $sql = "SELECT * FROM users WHERE role_id = '2' ";
        return $this->getFirst($sql);
        
    }

}


?>