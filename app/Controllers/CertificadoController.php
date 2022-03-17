<?php

namespace App\Controllers;
use App\Models\AlunosModel;

class CertificadoController extends BaseController
{
	public function __construct()
	{
		$this->userModel = new AlunosModel();

	}
    public function index()
    {
    	echo view('templates/header');
        echo view('certificados/lista');
        echo view('templates/footer');
    }

    public function teste($data = null)
    {
    	return view('templates/header');
        return view('certificados/certificado_f', $data);
        return view('templates/footer');
    }

     public function geraPDF($query = null)
	 {

	 	$nome_arquivo = 'teste23';
		$mpdf = new \Mpdf\Mpdf();

		$mpdf->AddPage('L', '', '', '', '', 29, 25, 55, 30, 18, 12);
		// $html = view('certificados/certificado_f',[]);
		$html = view('certificados/certificado_f', $query);
		$mpdf->WriteHTML($html);
		$html = ob_get_clean();
		$mpdf->AddPage('L', '', '', '', '', 29, 25, 55, 30, 18, 12);
		$html = view('certificados/certificado_v',[]);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		//$mpdf->Output('arjun.pdf','I'); // opens in browser
		//$mpdf->Output("$nome_arquivo.pdf", 'I');
		return redirect($mpdf->Output("$nome_arquivo.pdf", 'I'))->to( site_url('/') );
		//$mpdf->Output('arjun.pdf','D'); 


		// Saves file on the server as 'filename.pdf'
		
	 }


	 public function geraCertificado($cod_aluno = null){
	 	$db      = \Config\Database::connect();
	 // 	$builder = $db->table('s_alunos a');
		// $query = $builder->where('cod_aluno', $cod_aluno );
		// $builder->select('a.cpf, a.id_curso');


		$query = $db->query('SELECT cpf FROM s_alunos LIMIT 1');
		$row   = $query->getRowArray();
		//echo $row['cpf'];

		//dd($row);

		//$data['dados'] = $builder->getRowArray()();
		//$data['dados'] = $builder->get()->getRow();
		//$data = $data['cpf'] . $data['id_curso'];
		//echo $data['cpf'];
		//dd($data);

		//$data = '234234234234';
		$builder = $db->table('s_certificados_emitidos');
		$builder->set('cod_verificacao ', $cod_aluno . $row['cpf']);
		$builder->insert();
		// Produces: INSERT INTO mytable (`name`) VALUES ('{$name}')
	 }

	 public function select_certificado($cod_aluno = null)
	 {
	 	$db      = \Config\Database::connect();
		$builder = $db->table('s_alunos a');
		$builder->where('cod_aluno ', $cod_aluno );
		


		$builder->select('a.nome_aluno, c.curso_sigla, c.curso_periodo, t.tratamento_descricao, p.posto_descricao, e. especialidade_descricao, c-e.cod_verificacao ');
		
		$builder->join('p_especialidade e', 'e.id_especialidade = a.id_especialidade');
		$builder->join('p_om o', 'o.id_om = a.id_om');
		$builder->join('p_posto p', 'p.id_posto = a.id_posto');
		$builder->join('p_tratamento t', 't.id_tratamento = a.id_tratamento');
		$builder->join('s_cursos c', 'c.id_curso = a.id_curso');
		$builder->join('s_certificados_emitidos c-e', 'c-e.id_aluno = a.id_aluno');

		//$query = $builder->get();

		$data['dados'] = $builder->get()->getRow();

		//dd($data);

		// echo '<pre>';
		// print_r($query->getResultArray());
		// echo '</pre>';

		

		//return view('certificados/certificado_f', $data);






		$this->geraPDF($data);

		

			//$query['dados'] = $builder->get()->getResult();
		//$query = $builder->get();

		//$data['query']= $this->AlunosModel->get_user();

		//$data['dados'] = $builder->get()->getRow();


	 	
	 }
}


