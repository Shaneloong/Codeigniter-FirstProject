<?php 

namespace App\Controllers;

class Login extends BaseController {
    public function new(){
        return view('Login/new');
    }

    public function create(){

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $remember_me = (bool) $this->request->getPost('remember_me');


        // $auth = \Config\Services::auth(); // First way to get the auth service
        $auth = service('auth'); // Second way to get the auth service
        if($auth->login($email, $password, $remember_me )){
            $redirect_url = session('redirect_url') ?? '/';

            unset($_SESSION['redirect_url']);

            return redirect()->to($redirect_url)
                            ->with('info', lang('Login.successful'))
                            ->withCookies();
        }
        else{
            return redirect()->back()
                            ->with('warning', lang('Login.invalid'))
                            ->withInput();
        }
    }

    public function delete(){
        $auth = new \App\Libraries\Authentication;

        service('auth')->logout();
        
        return redirect()->to('/login/showLogoutMessage')->withCookies();
    }

    public function showLogoutMessage(){
        return redirect()->to('/')
                ->with('info', lang('Login.logout_successful'));
    }
    
}