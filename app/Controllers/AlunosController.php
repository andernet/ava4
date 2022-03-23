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
        
        $db      = \Config\Database::connect();
        $builder = $db->table('s_aluno as a');

        $builder->select('
            a.nome_aluno, 
            a.id_aluno, 
            a.cpf, 
            a.saram,
            a.cod_aluno,
            c.curso_sigla, 
            o.om_sigla, 
            c.curso_periodo, 
            t.tratamento, 
            q.quadro, 
            p.posto_sigla, 
            e.especialidade, 
            c-e.cod_verificacao,
            s.situacao');
        
        $builder->join('p_especialidade e', 'e.id_especialidade = a.id_especialidade', 'left');
        $builder->join('p_om o', 'o.id_om = a.id_om', 'left');
        $builder->join('p_posto p', 'p.id_posto = a.id_posto', 'left');
        $builder->join('p_quadro q', 'q.id_quadro = a.id_quadro', 'left');
        $builder->join('p_tratamento t', 't.id_tratamento = a.id_tratamento', 'left');
        $builder->join('p_curso c', 'c.id_curso = a.id_curso', 'left');
        $builder->join('s_certificado_emitido c-e', 'c-e.cod_aluno = a.cod_aluno', 'left');
        $builder->join('p_situacao s', 's.id_situacao = a.id_situacao', 'left');

        //dd($builder->getCompiledSelect());
        
        $query['alunos'] = $builder->get()->getResultArray();
        
        return view('alunos/lista_alunos', $query);	
        //return view('alunos/lista_alunos', [
		// 	'alunos' => $this->alunosModel->paginate(10),
		// 	'pager' => $this->alunosModel->pager
		// ]);

        //SELECT s_aluno.nome_aluno as "Nome", p_situacao.situacao as "Eh burro?" FROM p_situacao, s_aluno WHERE s_aluno.id_situacao = p_situacao.id_situacao
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
