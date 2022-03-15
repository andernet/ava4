<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    private $userModel;

	public function __construct()
	{
		$this->userModel = new UserModel();
		helper (['form']);
	}

	public function index()
	{
		echo view('include_files/header');
        echo view('include_files/nav');
		return view('home');
	}

	public function login()
	{
		$data = [];

		echo view('include_files/header');
        echo view('include_files/nav');
		//return view('login');
		echo view('login');
		echo view('include_files/footer');
	}

	public function lista_usuarios()
	{
		echo view('include_files/header');
        echo view('include_files/nav');
		return view('users/users', [
			'users' => $this->userModel->paginate(10),
			'pager' => $this->userModel->pager
		]);
	}

	public function delete($user_id)
	{
		if ($this->userModel->delete($user_id)) {
			return redirect()->to('lista_usuarios');
			// echo view('messages', [
			// 	'message' => 'Usuário Excluído com Sucesso'
			// ]);
		} else {
			echo "Erro.";
		}
	}


	public function register() {
		
		$data = [];

        if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'user_nome' => 'required|min_length[3]|max_length[20]',
				'username' => 'required|min_length[3]|max_length[20]',
				'senha' => 'required|min_length[6]|max_length[255]',
				'senha_confirm' => 'matches[password]',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$newData = [
					'user_nome' => $this->request->getVar('user_nome'),
					'username' => $this->request->getVar('username'),
					'senha' => $this->request->getVar('senha'),
					'id_user_tipo' => $this->request->getVar('id_user_tipo'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Registrado com sucesso.');
				return redirect()->to('users/register');

			}
		}
		echo view('include_files/header', $data);
        echo view('include_files/nav');
		echo view('users/register');

		//https://www.youtube.com/watch?v=SbiszsRnETo

		
        // if (!$inputs) {
        //     return view('users/register', [
        //         'validation' => $this->validator
        //     ]);
        // }
    }

	public function store()
	{
		if ($this->userModel->save($this->request->getPost())) {
			return view("messages", [
				'message' => 'Usuário salvo com sucesso'
			]);
		} else {
			echo "Ocorreu um erro.";
		}
	}

	public function edit($id)
	{
		return view('form', [
			'user' => $this->userModel->find($id)
		]);
	}

	public function send_cert()
    {
        echo 'x';
    }
}
