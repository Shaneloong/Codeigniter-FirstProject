<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index($locale = '')
    {
        if($locale === ''){

            session()->keepFlashdata('info');

            return redirect()->to($this->locale); // redirect to the home page with a locale

        }

        $this->request->setLocale($locale);
        
        session()->set('locale', $locale);

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
            echo $email->printDebugger();
        }
    }
}
