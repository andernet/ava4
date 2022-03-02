<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Libraries\Hash;

use CodeIgniter\Validation\Validation;

class Auth extends BaseController
{
    public function __construct()
	{
		$this->userModel = new UserModel();
		
		helper (['form', 'url', 'form_validation']);
        
        // parent::__construct();
        // $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {
        // //validação
        // $validation = $this->validate([
        //     'user_nome' => 'required|min_length[3]|max_length[20]',
        //     'username' => 'required|min_length[3]|max_length[20]',
        //     'senha' => 'required|min_length[6]|max_length[15]',
        //     'senha_conf' => 'required|matches[senha]',
        //     //'id_user_tipo'
        // ]);
        // if(!$validation){
        //     return view('auth/register', ['validation'=>$this->validator]);
        // }else{
        //     echo 'gravado';
        // }

        //novo
        $validation =  \Config\Services::validation();
        $data = [
            'validation' => \config\services::validation()
        ];
        $validation = $this->validate([
            'user_nome' => [
                'label'  => 'Nome',
                'rules'  => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'Campo nome obrigatório (min 3 max 20)',
                    'min_length' => 'Tamanho mínimo do nome 3',
                ],
            ],
            'username' => [
                //'label'  => 'Rules.password',
                'rules'  => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'Campo username obrigatório (min 3 max 20)',
                ],
            ],
            'senha' => [
                //'label'  => 'Rules.password',
                'rules'  => 'required|min_length[6]|max_length[15]',
                'errors' => [
                    'required' => 'Campo senha obrigatório',
                    'min_length' => 'Tamanho mínimo da senha 6',
                    'max_length' => 'Tamanho máximo da senha 15',
                ],
            ],
            'senha_conf' => [
                //'label'  => 'Rules.password',
                'rules'  => 'required|min_length[6]|max_length[15]|matches[senha]',
                'errors' => [
                    'required' => 'Campo confirmar senha obrigatório',
                    'matches'=> 'Senhas não são iguais'
                ],
            ],
            'id_user_tipo' => [
                //'label'  => 'Rules.password',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Selecione tipo de usuário',
                ],
            ],
        ]
    );
        if(!$validation){
            return view('auth/register', ['validation'=>$this->validator]);
        }else{
            //inserindo no banco
            $user_nome = $this->request->getPost('user_nome');
            $username = $this->request->getPost('username');
            $senha = $this->request->getPost('senha');
            $senha_conf = $this->request->getPost('senha_conf');
            $id_user_tipo = $this->request->getPost('id_user_tipo');

            $values = [
                'user_nome'=>$user_nome,
                'username'=>$username,
                'senha'=>Hash::make($senha),
                //'senha_conf'=>$senha_conf,
                'id_user_tipo'=>$id_user_tipo,
            ];

            //$usersModel = new
            $userModel = new UserModel();
            $query = $userModel->insert($values);
            //$this->unset($values);
            //$values = '';
            //return view('auth/register');
            if(!$query){
                return redirect()->back()->with('fail', 'Não foi possível salvar!');
            }else{
                return redirect()->to('auth/register')->with('success', 'Gravado com sucesso.');
            }
        }
        

    }
    function check(){
        //echo "Checando usuário...........";
        $validation = $this->validate([
            'username'=>[
                'rules'=>'required|is_not_unique[users.username]',
                'errors'=>[
                    'required'=>'Username é obrigatório!',
                    'is_not_unique'=>'Usuário não cadastrato!'
                ]
                ],
                'senha'=>[
                    'required'=>'required',
                    'errors'=>[
                        'required'=>'Senha é obrigatório'
                    ]

                ]
        ]);
        if(!$validation){
            return view('auth/login', ['validation'=>$this->validator]);
        }else{
            echo 'Usuário autorizado.';
        }
    }
}

//