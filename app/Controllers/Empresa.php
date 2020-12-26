<?php namespace App\Controllers;

class Empresa extends BaseController
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

	public function verEmpresa()
	{
        $data['titulo'] = 'IMob - Empresa';
        $data['acao'] = 'Alterar';
        $data['msg'] = '';
        $data['erros'] = '';
        $empresaModel = new \App\Models\EmpresaModel();
        $empresa = $empresaModel->find(1);

        if($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $empresa->nm_fantasia = $this->request->getPost('nm_fantasia');
            $empresa->nm_razaoSocial = $this->request->getPost('nm_razaoSocial');
            $empresa->ds_cnpj = $this->request->getPost('ds_cnpj');
            $empresa->ds_inscricaoEstadual = $this->request->getPost('ds_inscricaoEstadual');
            $empresa->ds_inscricaoMunicipal = $this->request->getPost('ds_inscricaoMunicipal');
            $empresa->ds_email = $this->request->getPost('ds_email');
            $empresa->nr_telefone = $this->request->getPost('nr_telefone');
            $empresa->nm_site = $this->request->getPost('nm_site');
            $empresa->nm_rua = $this->request->getPost('nm_rua');
            $empresa->nr_numero = $this->request->getPost('nr_numero');
            $empresa->nm_bairro = $this->request->getPost('nm_bairro');
            $empresa->nm_cidade = $this->request->getPost('nm_cidade');
            $empresa->ds_uf = $this->request->getPost('ds_uf');

            if($empresaModel->update(1, $empresa)) {
                $data['msg'] = 'Alterado com sucesso';
            }
            else {
                $data['msg'] = 'Erro ao alterar';
                $data['erros'] = $empresa->errors();
            }
        }
        $data['empresa'] = $empresa;
        return view('view_empresa', $data);
	}
}
