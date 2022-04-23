<?php 

require('app/Requests/BaseRequest.php');

class UserRequest extends BaseRequest
{
    public function validateStore($data)
    {
        if (strlen($data['first_name']) === 0) {
            $this->errors['first_name'] = "First name is required";
        }

        if (strlen($data['last_name']) === 0) {
            $this->errors['last_name'] = "Last name is required";
        }

        return $this->errors;
    }

    public function validateUpdate($data)
    {
        if (strlen($data['first_name']) === 0) {
            $this->errors['first_name'] = "First name is required";
        }

        if (strlen($data['last_name']) === 0) {
            $this->errors['last_name'] = "Last name is required";
        }

        return $this->errors;
    }
}