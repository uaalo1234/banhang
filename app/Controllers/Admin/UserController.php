<?php

require('app/models/User.php');
require('core/Flash.php');
require('app/Requests/UserRequest.php');

class UserController extends Controller
{
    protected $layout = 'admin/layouts/index.php';

    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $this->middleware('Authenticated', ['a' => 'b']);
        $users = $this->user->all();
        $this->title = "Index page";
        return $this->view('admin/user/index.php', [
            'user' => $this->user,
            'users' => $users
        ]);
    }

    public function show()
    {
        if (isset($_GET['id'])) 
        {  
            $user = $this->user->first($_GET['id']);
            
            return $this->view('admin/user/view.php', [
                'user' => $user
            ]);
        }
    }

    public function create()
    {
        return $this->view('admin/user/create.php');
    }

    public function store()
    {
        $userRequest = new UserRequest();
        $errors = $userRequest->validateStore($_POST);

        if (count($errors) === 0) 
        {
            $isCreated = $this->user->create($_POST);
            if ($isCreated) {
                Flash::set('success', 'Thanh cong');
                return redirect('admin/user/index');
            }
        }
        
        return $this->view('admin/user/create.php', ['errors' => $errors]);
    }

    public function edit() 
    {
        if (isset($_GET['id'])) 
        {
            $id = $_GET['id'];
            $user = $this->user->first($id);
            return $this->view('admin/user/edit.php', [
                'id' => $id,
                'user' => $user
            ]);
        }
    }

    public function update()
    {
        $id = $_GET['id'];

        $userRequest = new UserRequest();
        $errors = $userRequest->validateUpdate($_POST);

        if (count($errors) === 0) {
            $isCreated = $this->user->update($_POST, $id);
            if ($isCreated) {
                Flash::set('success', 'Cập nhật thành công');
                return redirect('admin/user/index');
            }
        }
        
        return $this->view('admin/user/create.php', [
            'id' => $id,
            'errors' => $errors
        ]);
    }

    public function delete()
    {
        $id = $_GET['id'];
        $result = $this->user->delete($id);
        if ($result) {
            return redirect('admin/user/index');
        }
    }
}