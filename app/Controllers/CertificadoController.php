<?php

namespace App\Controllers;
use App\Models\AlunosModel;
use App\Models\UserModel;
use App\Libraries\Hash;

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
		
	 }


	 public function geraCertificado($cod_aluno = null){
	 	
	 	//dd($cod_aluno);
	 	$db = \Config\Database::connect();
	 	$builder = $db->table('s_certificado_emitido');
	 	$builder->select('cod_aluno');
	 	$builder->where('cod_aluno ', $cod_aluno );
	 	$data['dados'] = $builder->get()->getRow();
	 	
		//$query = $db->query("select cod_aluno from s_certificado_emitido where cod_aluno = '".$cod_aluno."'");
		
		//print_r($query);
		//$cod  = $query->getRowArray();
		//dd($data);

		if ( isset($data['dados'])) {
			$data =[
				'erro' => 'ja',
			];
			return redirect()->to('AlunosController/lista_alunos');
		} else {
			$cod_verificacao = uniqid();
			//$sql = "insert into s_certificado_emitido (cod_aluno, cod_verificacao) VALUES('" . $data['dados']."','". $cod_verificacao ."'";
			$sql = "insert into s_certificado_emitido (cod_aluno, cod_verificacao) VALUES('".$cod_aluno."', '". $cod_verificacao ."')";
			
			$db->query($sql);
		}
	 }

	 public function select_certificado($id_aluno = null)
	 {

	 	//primeiro verifica se foi gerado certificado

	 	//dd($cod_aluno);
	 	

	 	$db      = \Config\Database::connect();
        $builder = $db->table('s_aluno as a');
        $builder->where('id_aluno ', $id_aluno );

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
		//$query = $builder->get();

		//retornar array
		$data['dados'] = $builder->get()->getResultArray();
		//$data['dados'] = $builder->get()->getResult();

        //retorna objeto
		//$data['dados'] = $builder->get()->getRow();

		//dd($data);
		
		print $data['cod_aluno'];

		// echo '<pre>';
		// print_r($query->getResultArray());
		// echo '</pre>';
		$this->geraPDF($data);

		

		//return view('certificados/certificado_f', $data);

		// if (isset($data['cod_aluno'])) {
		// 	$db = \Config\Database::connect();
		//  	$builder = $db->table('s_certificado_emitido');
		//  	$builder->select('cod_aluno');
		//  	//$builder->where('cod_aluno ', $cod_aluno );
		//  	$builder->where('id_aluno ', $id_aluno );
		//  	$data['dados'] = $builder->get()->getRow();

		//  	

		// } else {
			
		// 	return redirect()->to('AlunosController/lista_alunos');
		// }
		
		




		

		

			//$query['dados'] = $builder->get()->getResult();
		//$query = $builder->get();

		//$data['query']= $this->AlunosModel->get_user();

		//$data['dados'] = $builder->get()->getRow();


	 	
	 }
}


