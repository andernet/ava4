<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        //return view('welcome_message');
        
 
        echo view('include_files/header');
        echo view('include_files/nav');
        echo view('welcome_message');
        echo view('include_files/footer');
    }

    public function teste()
    {
        return view('teste');
    }
}
