<?php
require_once ('app/Controllers/Web/WebController.php');
require_once ('app/Requests/Web/AuthRequest.php'); 
require_once ('app/Models/Users.php');
require_once ('app/Models/Role.php');
require_once ('core/Flash.php');
require_once ('core/Auth.php');


class AuthController extends WebController{
    public function login(){
        return $this->view('login.php');
    }
    public function register(){
        return $this->view('register.php');

    }
    public function handleRegister(){
        // $authRequest = new AuthRequest();
        // $errors = $authRequest->validateRegister($_POST);
        // if(count($errors) == 0){
             $user = new Users();
             $_POST['role_id'] = Role::USERS; 
             $_POST['password'] = md5($_POST['password']); 
             $isCreated = $user->create($_POST);
             if($isCreated ){
                return redirect('auth/login');
             }
        // }
        // return $this->view('register.php', ['errors' => $errors, 'data' => $_POST]);
    }
    public function handleLogin(){
        
         $user = new Users();
         $user = $user->authenticate($_POST);
         if($user && $user['role_id'] = Role::USERS ){
            Auth::setUser('user', $user , true );
            return redirect('cart/s_cart');
         }
         Flash::set('error','Log in False !!');
         return redirect('auth/login');
    }
    public function logout(){

        Auth::logout('user');
        return redirect('auth/login');
    }
}
?>