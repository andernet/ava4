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
        //return view('welcome_message');

        $data =[
             'title'=>'Dashboard',
        //     'userInfo'=>$userInfo
         ];
        // return view('/dashboard', $data);
        //$data['user'] = $model->where('id', session()->get('id'))->first();
        echo view('templates/header', $data);
        echo view('welcome_message');
        echo view('templates/footer');

    }

    public function logado()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $data =[
            'title'=>'Dashboard',
            'userInfo'=>$userInfo
        ];
        //return view('/dashboard', $data);
        //return view('welcome_message');

        echo view('templates/header', $data);
        echo view('/dashboard');
        echo view('templates/footer');

    }

    public function lista_alunos()
    {
        $data =[
             'title'=>'Dashboard',
        //     'userInfo'=>$userInfo
         ];
        //return view ('alunos/alunos.php');
        echo view('templates/header', $data);
        echo view('/alunos/alunos');
        echo view('templates/footer');
    }
    
    public function profile()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $data =[
            'title'=>'Profile',
            'userInfo'=>$userInfo
        ];
        return view('/profile', $data);
        //return view('welcome_message');

    }
}
