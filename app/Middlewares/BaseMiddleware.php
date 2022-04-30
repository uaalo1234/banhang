<?php 

abstract class BaseMiddleware
{
    public abstract function handle($parameters);

    public function __destruct()
    {
        exit();
    }
}