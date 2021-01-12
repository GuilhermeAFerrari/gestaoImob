<?php namespace App\Controllers;

class PessoaS extends BaseController
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

	public function listarProprietarios()
	{
        $pessoasModel = new \App\Models\PessoasModel();
        $data['proprietarios'] = $pessoasModel->listarProprietarios();
        $data['titulo'] = 'IMob - Locador';
        $data['acao'] = 'Adicionar locador';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('view_proprietario_listar', $data);
    }

    public function listarInquilinos()
	{
        $pessoasModel = new \App\Models\PessoasModel();
        $data['inquilinos'] = $pessoasModel->listarInquilinos();
        $data['titulo'] = 'IMob - Locatário';
        $data['acao'] = 'Adicionar locatário';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('view_inquilino_listar', $data);
    }

    public function listarFiadores()
	{
        $pessoasModel = new \App\Models\PessoasModel();
        $data['fiadores'] = $pessoasModel->listarFiadores();
        $data['titulo'] = 'IMob - Fiadores';
        $data['acao'] = 'Adicionar fiador';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('view_fiador_listar', $data);
    }

    public function listarLeads()
	{
        $pessoasModel = new \App\Models\PessoasModel();
        $data['leads'] = $pessoasModel->listarLeads();
        $data['titulo'] = 'IMob - Leads';
        $data['acao'] = 'Adicionar lead';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('view_lead_listar', $data);
    }
    
    public function adicionarPessoa()
	{
        $data['titulo'] = 'IMob - Cadastros';
		$data['acao'] = 'Salvar';
		$data['msg'] = '';
        $data['erros'] = '';

		if($this->request->getMethod() == 'post') {
            $pessoa = new \App\Models\PessoasModel();
            $pessoa->set('nm_pessoa', $this->request->getPost('nm_pessoa'));
            $pessoa->set('ds_email', $this->request->getPost('ds_email'));
            $pessoa->set('nr_telefone1', $this->request->getPost('nr_telefone1'));
            $pessoa->set('nr_telefone2', $this->request->getPost('nr_telefone2'));
            $pessoa->set('nm_rua', $this->request->getPost('nm_rua'));
            $pessoa->set('nr_numero', $this->request->getPost('nr_numero'));
            $pessoa->set('nm_bairro', $this->request->getPost('nm_bairro'));
            $pessoa->set('nm_cidade', $this->request->getPost('nm_cidade'));
            $pessoa->set('nm_uf', $this->request->getPost('nm_uf'));
            $pessoa->set('ds_cep', $this->request->getPost('ds_cep'));
            $pessoa->set('ds_complemento', $this->request->getPost('ds_complemento'));
            $pessoa->set('st_pessoa', 'Ativo');
            $pessoa->set('tp_pessoa', $this->request->getPost('tp_pessoa'));
            
            if($pessoa->insert()) {
                //deu certo
                $data['msg'] = 'Inserido com sucesso';
            }
            else {
                //nao deu certo
                $data['msg'] = 'Erro ao inserir';
                $data['erros'] = $pessoa->errors();
            }
		}
		return view('view_pessoa_adicionar', $data);
	}

    public function editarPessoa($id_pessoa)
    {
        $data['titulo'] = 'IMob - Cadastros';
		$data['acao'] = 'Editar';
		$data['msg'] = '';
        $data['erros'] = '';

        $pessoasModel = new \App\Models\PessoasModel();
        $pessoa = $pessoasModel->find($id_pessoa);

        if($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $pessoa->nm_pessoa = $this->request->getPost('nm_pessoa');
            $pessoa->ds_email = $this->request->getPost('ds_email');
            $pessoa->nr_telefone1 = $this->request->getPost('nr_telefone1');
            $pessoa->nr_telefone2 = $this->request->getPost('nr_telefone2');
            $pessoa->nm_rua = $this->request->getPost('nm_rua');
            $pessoa->nr_numero = $this->request->getPost('nr_numero');
            $pessoa->nm_bairro = $this->request->getPost('nm_bairro');
            $pessoa->nm_cidade = $this->request->getPost('nm_cidade');
            $pessoa->nm_uf = $this->request->getPost('nm_uf');
            $pessoa->ds_cep = $this->request->getPost('ds_cep');
            $pessoa->ds_complemento = $this->request->getPost('ds_complemento');
            $pessoa->st_pessoa = 'Ativo';
            $pessoa->tp_pessoa = $this->request->getPost('tp_pessoa');

            if($pessoasModel->update($id_pessoa, $pessoa)) {
                $data['msg'] = 'Alterado com sucesso';
            }
            else {
                $data['msg'] = 'Erro ao alterar';
                $data['erros'] = $pessoasModel->errors();
            }
        }

        $data['pessoas'] = $pessoa;
        return view('view_pessoa_adicionar', $data);
	}

	public function confirmarExcluirPessoa($id_pessoa)
	{
        if(is_null($id_pessoa)) {
            //redirecionar para a view de usuários - 'view_list_estoque'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('principal'));
        }
        $pessoasModel = new \App\Models\PessoasModel();
        $data['pessoa'] = $pessoasModel->find($id_pessoa);
        $data['id_pessoa'] = $id_pessoa;
        $data['titulo'] = 'IMob - Cadastros';
        return view('view_delete_pessoa', $data);
    }
	
	public function excluirPessoa($id_pessoa = null)
    {
        if(is_null($id_pessoa)) {
            //redirecionar para a view de usuários - 'view_list_usuario'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('principal'));
        }
        $data['titulo'] = 'IMob - Cadastros';
        $data['acao'] = 'Excluir';

        $pessoasModel = new \App\Models\PessoasModel();
        if($pessoasModel->delete($id_pessoa)) {
            $this->session->setFlashdata('msg', 'Excluído com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }

        return redirect()->to(base_url('principal'));
	}
}
