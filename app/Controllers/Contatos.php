<?php namespace App\Controllers;

class Contatos extends BaseController
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

	public function listarContatos()
	{
        $contatosModel = new \App\Models\ContatosModel();
        $data['contatos'] = $contatosModel->findAll();
        $data['titulo'] = 'IMob - Contatos';
        $data['acao'] = 'Adicionar contato';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('view_contatos_listar', $data);
	}
	
	public function adicionarContatos()
	{
        $data['titulo'] = 'IMob - Contatos';
		$data['acao'] = 'Salvar';
		$data['msg'] = '';
        $data['erros'] = '';

		if($this->request->getMethod() == 'post') {
            $contatos = new \App\Models\ContatosModel();
            $contatos->set('nm_contact', $this->request->getPost('nm_contact'));
            $contatos->set('nr1_contact', $this->request->getPost('nr1_contact'));
			$contatos->set('nr2_contact', $this->request->getPost('nr2_contact'));
			$contatos->set('ds_email', $this->request->getPost('ds_email'));
			$contatos->set('ds_endereco', $this->request->getPost('ds_endereco'));
			$contatos->set('nr_endereco', $this->request->getPost('nr_endereco'));
			$contatos->set('ds_bairro', $this->request->getPost('ds_bairro'));
			$contatos->set('nm_cidade', $this->request->getPost('nm_cidade'));
			$contatos->set('nm_uf', $this->request->getPost('nm_uf'));
            
            if($contatos->insert()) {
                //deu certo
                $data['msg'] = 'Inserido com sucesso';
            }
            else {
                //nao deu certo
                $data['msg'] = 'Erro ao inserir';
                $data['erros'] = $contatos->errors();
            }
		}
		return view('view_contatos_adicionar', $data);
	}

	public function editarContatos($id_contact)
    {
        $data['titulo'] = 'IMob - Contatos';
		$data['acao'] = 'Editar';
		$data['msg'] = '';
        $data['erros'] = '';

        $contatoModel = new \App\Models\ContatosModel();
        $contato = $contatoModel->find($id_contact);

        if($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $contato->nm_contact = $this->request->getPost('nm_contact');
            $contato->nr1_contact = $this->request->getPost('nr1_contact');
            $contato->nr2_contact = $this->request->getPost('nr2_contact');
			$contato->ds_email = $this->request->getPost('ds_email');
			$contato->ds_endereco = $this->request->getPost('ds_endereco');
			$contato->nr_endereco = $this->request->getPost('nr_endereco');
			$contato->ds_bairro = $this->request->getPost('ds_bairro');
			$contato->nm_cidade = $this->request->getPost('nm_cidade');
			$contato->nm_uf = $this->request->getPost('nm_uf');

            if($contatoModel->update($id_contact, $contato)) {
                $data['msg'] = 'Alterado com sucesso';
            }
            else {
                $data['msg'] = 'Erro ao alterar';
                $data['erros'] = $contatoModel->errors();
            }
        }

        $data['contato'] = $contato;
        return view('view_contatos_adicionar', $data);
	}

	public function confirmarExcluirContato($id_contact)
	{
        if(is_null($id_contact)) {
            //redirecionar para a view de usuários - 'view_list_estoque'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('agenda-contatos'));
        }
        $data['id_contact'] = $id_contact;
        $data['titulo'] = 'IMob - Contatos';
        return view('view_delete_contato', $data);
    }
	
	public function excluirContato($id_contact = null)
    {
        if(is_null($id_contact)) {
            //redirecionar para a view de usuários - 'view_list_usuario'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Contato não encontrado');
            return redirect()->to(base_url('agenda-contatos'));
        }
        $data['titulo'] = 'IMob - Contatos';
        $data['acao'] = 'Excluir';

        $contatosModel = new \App\Models\ContatosModel();
        if($contatosModel->delete($id_contact)) {
            $this->session->setFlashdata('msg', 'Contato excluído com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir contato');
        }

        return redirect()->to(base_url('agenda-contatos'));
	}
}
