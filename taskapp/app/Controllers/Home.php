<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // echo view("Header");
        // helper('auth');
        return view('Home/index');
        // echo "Hello world";
    }

    public function testEmail (){
        $email = service('email');

        $email->setTo('shaneloong66@gmail.com   ');

        $email->setSubject('Test Email');

        $email->setMessage('<h1>Hello World</h1>');

        if($email->send()){
            echo "Email sent";
        }
        else{
            echo "Email not sent";
        }
    }
}
