<?php namespace App\Controllers;

class Contratos extends BaseController
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
    
    public function listarAtivos()
	{
        $contratosModel = new \App\Models\ContratosModel();
        $data['contratos'] = $contratosModel->listarAtivos();
        $data['acao'] = 'Ativos';
        $data['titulo'] = 'IMob - Contratos';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('view_contratos_listar', $data);
    }

    public function listarPendentes()
	{
        $contratosModel = new \App\Models\ContratosModel();
        $data['contratos'] = $contratosModel->listarPendentes();
        $data['acao'] = 'Pendentes';
        $data['titulo'] = 'IMob - Contratos';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('view_contratos_listar', $data);
    }

    public function listarEncerrados()
	{
        $contratosModel = new \App\Models\ContratosModel();
        $data['contratos'] = $contratosModel->listarEncerrados();
        $data['acao'] = 'Encerrados';
        $data['titulo'] = 'IMob - Contratos';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('view_contratos_listar', $data);
    }
    
    public function cadastrarContratos()
	{
        $inquilino = new \App\Models\PessoasModel();
        $data['inquilinos'] = $inquilino->listarInquilinos();
        $inquilino = new \App\Models\PessoasModel();
        $data['proprietarios'] = $inquilino->listarProprietarios();
        $inquilino = new \App\Models\PessoasModel();
        $data['fiadores'] = $inquilino->listarFiadores();
        $imovel = new \App\Models\ImoveisModel();
        $data['imoveis'] = $imovel->findAll();
        $data['titulo'] = 'IMob - Contratos';
		$data['acao'] = 'Salvar';
		$data['msg'] = '';
        $data['erros'] = '';

		if($this->request->getMethod() == 'post') {
            $contrato = new \App\Models\ContratosModel();
            $contrato->set('tp_contrato', $this->request->getPost('tp_contrato'));
            $contrato->set('nm_inquilino', $this->request->getPost('nm_inquilino'));
            $contrato->set('nm_proprietario', $this->request->getPost('nm_proprietario'));
            $contrato->set('nm_fiador', $this->request->getPost('nm_fiador'));
            $contrato->set('ds_imovel', $this->request->getPost('ds_imovel'));
            $contrato->set('dt_contrato', $this->request->getPost('dt_contrato'));
            $contrato->set('nm_vendedor', $this->request->getPost('nm_vendedor'));
            $contrato->set('st_contrato', $this->request->getPost('st_contrato'));
            $contrato->set('nr_valor', $this->request->getPost('nr_valor'));
            $contrato->set('dt_vencimento', $this->request->getPost('dt_vencimento'));
            $contrato->set('ds_observacao', $this->request->getPost('ds_observacao'));
            
            if($contrato->insert()) {
                //deu certo
                $data['msg'] = 'Inserido com sucesso';
            }
            else {
                //nao deu certo
                $data['msg'] = 'Erro ao inserir';
                $data['erros'] = $contrato->errors();
            }
		}
		return view('view_contratos_adicionar', $data);
	}
}
