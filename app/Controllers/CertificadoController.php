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

    public function geraPDF($data = null)
    {
    	return view('templates/header');
        return view('certificados/certificado_f', $data);
        return view('templates/footer');
    }

     public function geraPDF1($query = null)
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

	 public function select_certificado($id_aluno = null)
	 {
	 	$db      = \Config\Database::connect();
		$builder = $db->table('s_alunos');

	 	
		
		$builder->where('id_aluno', $id_aluno);
		//$query['dados'] = $builder->get()->getResult();
		//$query = $builder->get();

		//$data['query']= $this->AlunosModel->get_user();

		$data['dados'] = $builder->get()->getRow();

		//dd($data);

		// echo '<pre>';
		// print_r($query->getResult());
		// echo '</pre>';

		//$data['age'] = 20;
		//$data['username'] = 'PMKLab';
		//$data['price'] = 4.5;
		//return view('certificados/certificado_f', $data);
		
		return view('certificados/certificado_f', $data);
		//$this->geraPDF($query);

		


	 	
	 }
}


