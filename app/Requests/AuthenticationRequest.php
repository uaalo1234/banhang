<?php 

require_once('app/Requests/BaseRequest.php');

/**
 * Bắt buộc sử dụng $this->errors để log data
 */
class AuthenticationRequest extends BaseRequest
{
    public function validateLogin($data)
    {
        if (empty($data['email'])) {
            $this->errors['email'] = "Email không được để trống";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password không được để trống";
        }
    }

    public function validateRegister($data)
    {
        if (empty($data['email'])) {
            $this->errors['email'] = "Email không được để trống";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password không được để trống";
        }

        if (empty($data['name'])) {
            $this->errors['name'] = "Name không được để trống";
        }
    }
}