<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        // $userModel = new UserModel();
        // $loggedUserID = session()->get('loggedUser');
        // $userInfo = $userModel->find($loggedUserID);
        // $data =[
        //     'title'=>'Dashboard',
        //     'userInfo'=>$userInfo
        // ];
        // return view('/dashboard', $data);
        return view('welcome_message');

    }
}
