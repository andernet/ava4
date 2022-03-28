<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AvaController extends BaseController
{
    public function index()
    {
        //
    }

    public function pre()
    {
        echo view('templates/header');
        return view('ava/pre');
    }


    public function ava_int()
    {
        echo view('templates/header');
        return view('ava/ava_int');
    }

    public function ava_curso()
    {
        echo view('templates/header');
        return view('ava/ava_curso');
    }


    public function pos()
    {
        echo view('templates/header');
        return view('ava/pos');
    }


    public function save_pre()
    {
        echo view('templates/header');
        return view('ava/register');
    }


    public function save_ava_int()
    {
        echo view('templates/header');
        return view('ava/register');
    }


    public function save_curso()
    {
        echo view('templates/header');
        return view('ava/register');
    }


    public function save_pos()
    {
        echo view('templates/header');
        return view('ava/register');
    }

    public function create(){

        /* calling the insert function on model sending the form */
        $this->model->init_insert($this->request->getVar());

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user added!</b></div>");

        /* return to default page */
        return redirect("/");

    }

    /* controller to update a user */
    public function update(){

        /* calling the update function on model sending the form */
        $this->model->init_update($this->request->getVar());

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user edited!</b></div>");

        /* return to default page */
        return redirect("/");


    }

    /* controller to delete a user */
    public function delete($id = NULL){

        /* calling the delete function on model sending the url id */
        $this->model->init_delete($id);
        
        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user deleted!</b></div>");
        
        /* return to default page */
        return redirect("/");
        
    }
}
