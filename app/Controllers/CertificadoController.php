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

    public function lista()
    {
    	echo view('templates/header');
        echo view('certificados/lista');
        echo view('templates/footer');
    }

     public function geraPDF()
	 {
	 	$nome_arquivo = 'teste23';
		$mpdf = new \Mpdf\Mpdf();

		$mpdf->AddPage('L', '', '', '', '', 29, 25, 55, 30, 18, 12);
		$html = view('certificados/certificado_f',[]);

		$mpdf->WriteHTML($html);
		$html = ob_get_clean();

		$mpdf->AddPage('L', '', '', '', '', 29, 25, 55, 30, 18, 12);
		$html = view('certificados/certificado_v',[]);

		
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		//$mpdf->Output('arjun.pdf','I'); // opens in browser
		$mpdf->Output("$nome_arquivo.pdf", 'I');
		//$mpdf->Output('arjun.pdf','D'); 


		// Saves file on the server as 'filename.pdf'
		
	 }

	 public function select_certificado($nome_aluno = null)
	 {
	 	$db      = \Config\Database::connect();
		$builder = $db->table('s_alunos');

	 	//$nome_aluno = '2';
	 	//$model = new AlunosModel;
		
		$builder->where('nome_aluno', $nome_aluno);
		$query = $builder->get();
		
		echo '<pre>';
		print_r($query->getResult());
		echo '</pre>';


	 	
	 }
}


