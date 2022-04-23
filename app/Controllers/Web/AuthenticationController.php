<?php 

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/User.php');
require_once('core/Flash.php');
require_once('core/Auth.php');

class AuthenticationController extends WebController
{
    private $user;

    private $key = 'user';

    public function __construct()
    {
        $this->user = new User();
    }
    
    public function index()
    {
        return $this->view('authentication/index.php');
    }

    public function login()
    {
        $loggedUser = $this->user->where(['email' => $_POST['email'], 'password' => md5($_POST['password'])])->first();
        if ($loggedUser) {
            isset($_POST['remember_me']) ? Auth::setUser($this->key, $loggedUser, true) : Auth::setUser($this->key, $loggedUser);
            return redirect('homepage/index');
        }
        Flash::set('signin_error', 'Login failed');
        return redirect('authentication/index');
    }

    public function signUp()
    {
        $user = new User();
        $foundUser = $this->user->where(['email' => $_POST['email']])->get();
        if (count($foundUser) == 0) {
            $_POST['password'] = md5($_POST['password']);
            $isCreated = $user->create($_POST);
            if ($isCreated) {
                return redirect('homepage/index');
            }
        }
        Flash::set('signup_error', 'Email exist');
        return redirect('authentication/index');
    }

    public function logout()
    {
        Auth::logout($this->key);
        return redirect('homepage/index');
    }
}