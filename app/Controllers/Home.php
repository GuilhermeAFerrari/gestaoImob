<?php namespace App\Controllers;

class Home extends BaseController
{
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
	}
	public function index()
	{
		return view('welcome_message');
	}

	public function principal()
	{
        $notasModel = new \App\Models\NotasModel();
        $data['notas'] = $notasModel->findAll();
		return view('view_principal', $data);
	}

	//--------------------------------------------------------------------

}
