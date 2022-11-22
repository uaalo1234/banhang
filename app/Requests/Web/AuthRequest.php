<?php
require_once('app/Requests/BaseRequest.php');

class AuthRequest extends BaseRequest{
      

    public function validateRegister($data){

        $isPasswordEmptied  = false;
        if(empty($data['email'])){
            $this->errors['email'] = 'Email không được để trống';
        }
        if(empty($data['password'])){
            $this->errors['password'] = "Password không được để trống";
            $isPasswordEmptied = true;
        }
        if(empty($data['password_confirmation'])){
            $this->errors['password_confirmation'] = "Password-Comformation không được để trống";
            $isPasswordEmptied = true;
        }
        if(!$isPasswordEmptied){
            if($data['password'] != $data['password_confirmation']){
                $this->errors['password_confirmation'] = "Password phai giống nhau";
            }
        }

        return $this->errors;
    }
}
?>