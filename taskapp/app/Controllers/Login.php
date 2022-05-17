<?php 

namespace App\Controllers;

class Login extends BaseController {
    public function new(){
        return view('Login/new');
    }

    public function create(){

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // $auth = \Config\Services::auth(); // First way to get the auth service
        $auth = service('auth'); // Second way to get the auth service
        if($auth->login($email, $password)){
            $redirect_url = session('redirect_url') ?? '/';

            unset($_SESSION['redirect_url']);

            return redirect()->to($redirect_url)
            ->with('info', 'Login Successfully');
        }
        else{
            return redirect()->back()
                            ->with('warning', 'Invalid Login')
                            ->withInput();
        }
    }

    public function delete(){
        $auth = new \App\Libraries\Authentication;

        service('auth')->logout();
        
        return redirect()->to('/login/showLogoutMessage');
    }

    public function showLogoutMessage(){
        return redirect()->to('/')
                ->with('info', 'Logout Successfully');
    }
    
}