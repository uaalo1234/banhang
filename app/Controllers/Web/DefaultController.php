<?php 

require_once('app/Controllers/Controller.php');

class DefaultController extends Controller
{
    public function index()
    {
        return "This is default controller in module web";
    }
}