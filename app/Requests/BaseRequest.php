<?php 

class BaseRequest 
{
    protected $errors = [];

    public function getErrors()
    {
        return $this->errors;
    }
}
