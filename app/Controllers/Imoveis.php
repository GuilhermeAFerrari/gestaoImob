<?php namespace App\Controllers;

class Imoveis extends BaseController
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

	public function listarImoveis()
	{
        $imoveisModel = new \App\Models\ImoveisModel();
        $data['imoveis'] = $imoveisModel->findAll();
        $data['titulo'] = 'IMob - Imóveis';
        $data['acao'] = 'Adicionar imóvel';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('imoveis\view_imoveis_listar', $data);
    }
    
    public function adicionarImoveis()
	{
        $data['titulo'] = 'IMob - Imóveis';
		$data['acao'] = 'Salvar';
		$data['msg'] = '';
        $data['erros'] = '';

		if($this->request->getMethod() == 'post') {
            $imoveis = new \App\Models\ImoveisModel();
            $imoveis->set('nm_responsavel', $this->request->getPost('nm_responsavel'));
            $imoveis->set('nm_endereco', $this->request->getPost('nm_endereco'));
            $imoveis->set('nm_bairro', $this->request->getPost('nm_bairro'));
            $imoveis->set('nm_cidade', $this->request->getPost('nm_cidade'));
            $imoveis->set('ds_uf', $this->request->getPost('ds_uf'));
            $imoveis->set('ds_cep', $this->request->getPost('ds_cep'));
            $imoveis->set('tp_imovel', $this->request->getPost('tp_imovel'));
            $imoveis->set('nr_dormitorios', $this->request->getPost('nr_dormitorios'));
            $imoveis->set('nr_areaConstruida', $this->request->getPost('nr_areaConstruida'));
            $imoveis->set('nr_areaTotal', $this->request->getPost('nr_areaTotal'));
            $imoveis->set('tp_negocio', $this->request->getPost('tp_negocio'));
            $imoveis->set('nr_valor', $this->request->getPost('nr_valor'));
            
            if($imoveis->insert()) {
                //deu certo
                $data['msg'] = 'Inserido com sucesso';
            }
            else {
                //nao deu certo
                $data['msg'] = 'Erro ao inserir';
                $data['erros'] = $imoveis->errors();
            }
		}
		return view('imoveis\view_imoveis_adicionar', $data);
	}

    public function editarImoveis($id_imovel)
    {
        $data['titulo'] = 'IMob - Imóveis';
		$data['acao'] = 'Editar';
		$data['msg'] = '';
        $data['erros'] = '';

        $imoveisModel = new \App\Models\ImoveisModel();
        $imovel = $imoveisModel->find($id_imovel);

        if($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $imovel->nm_responsavel = $this->request->getPost('nm_responsavel');
            $imovel->nm_endereco = $this->request->getPost('nm_endereco');
            $imovel->nm_bairro = $this->request->getPost('nm_bairro');
            $imovel->nm_cidade = $this->request->getPost('nm_cidade');
            $imovel->ds_uf = $this->request->getPost('ds_uf');
            $imovel->ds_cep = $this->request->getPost('ds_cep');
            $imovel->tp_imovel = $this->request->getPost('tp_imovel');
            $imovel->nr_dormitorios = $this->request->getPost('nr_dormitorios');
            $imovel->nr_areaConstruida = $this->request->getPost('nr_areaConstruida');
            $imovel->nr_areaTotal = $this->request->getPost('nr_areaTotal');
            $imovel->tp_negocio = $this->request->getPost('tp_negocio');
            $imovel->nr_valor = $this->request->getPost('nr_valor');

            if($imoveisModel->update($id_imovel, $imovel)) {
                $data['msg'] = 'Alterado com sucesso';
            }
            else {
                $data['msg'] = 'Erro ao alterar';
                $data['erros'] = $imoveisModel->errors();
            }
        }

        $data['imovel'] = $imovel;
        return view('imoveis\view_imoveis_adicionar', $data);
	}

	public function confirmarExcluirImovel($id_imovel)
	{
        if(is_null($id_imovel)) {
            //redirecionar para a view de usuários - 'view_list_estoque'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('cadastros-imovel'));
        }
        $data['id_imovel'] = $id_imovel;
        $data['titulo'] = 'IMob - Imóveis';
        return view('imoveis\view_delete_imovel', $data);
    }
	
	public function excluirImoveis($id_imovel = null)
    {
        if(is_null($id_imovel)) {
            //redirecionar para a view de usuários - 'view_list_usuario'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Não encontrado');
            return redirect()->to(base_url('cadastros-imovel'));
        }
        $data['titulo'] = 'IMob - Imóveis';
        $data['acao'] = 'Excluir';

        $imoveisModel = new \App\Models\ImoveisModel();
        if($imoveisModel->delete($id_imovel)) {
            $this->session->setFlashdata('msg', 'Excluído com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }

        return redirect()->to(base_url('cadastros-imovel'));
	}
}
