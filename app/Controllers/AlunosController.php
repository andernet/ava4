<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AlunosModel;

class AlunosController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function __construct()
	{
		$this->alunosModel = new AlunosModel();
		helper (['form']);
	}
    public function index()
    {
        //
    }

    public function lista_alunos()
    {
        echo view('templates/header');
        
        // $alunos = new AlunosModel();
        // $listaAlunos = $alunos->findAll();

        // foreach ($listaAlunos as $lista) {
        //     $result[] = [
        //         $lista['id_aluno'],
        //         $lista['nome_aluno'],
        //         $lista['cpf'],
        //         $lista['id_curso'],
        //         $lista['id_tratamento'],
        //         $lista['id_posto'],
        //         $lista['id_quadro'],
        //         $lista['id_especialidade'],
        //         $lista['id_om'],
        //         $lista['id_situacao'],
        //         $lista['saram'],
        //         $lista['cod_aluno'],            
        //     ];
        // }
        // $listaAlunos = [
        //     'data' => $result
        // ];


        // echo "<pre>";
        // print_r(json_encode($data));
        // echo '</pre>';


        
        // echo view('alunos/lista_alunos', $listaAlunos);
     

        $db      = \Config\Database::connect();
        $builder = $db->table('s_aluno a');
        $builder->join('p_especialidade e', 'e.id_especialidade = a.id_especialidade');
		
        return view('alunos/lista_alunos', [
			'alunos' => $this->alunosModel->paginate(10),
			'pager' => $this->alunosModel->pager
		]);
    }
    


    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function cad_aluno(){

        //criar cod aluno cpf + cod do curso
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]',
                'cod_aluno' => 'is_unique[alunos.cod_aluno]',


                 
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/');

			}
		}
        echo view('templates/header', $data);
        echo view('alunos/cad_aluno');
        echo view('templates/footer');

		
	}

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
