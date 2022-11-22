<?php
require_once ('app/Controllers/Admin/BackendController.php');
require_once ('app/Requests/Admin/AuthRequest.php'); 
require_once ('app/Models/Users.php');
require_once ('app/Models/Role.php');
require_once ('core/Flash.php');
require_once ('core/Auth.php');


class AuthController extends BackendController{
    public function login(){
        return $this->view('auth/login.php');
    }

    public function handleLogin(){
         $user = new Users();
         $user = $user->authenticate($_POST);
         if($user && $user['role_id'] = Role::ADMIN){
            Auth::setUser('user', $user );
            return redirect('admin/dashboard/index');
         }
         Flash::set('error','Log in False !!');
         return redirect('admin/auth/login');
    }
    public function logout(){
        Auth::logout('user');
        return redirect('admin/auth/login');
    }
}
?>