<?php namespace App\Controllers;

class Notas extends BaseController
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

	public function listarNotas()
	{
        $notasModel = new \App\Models\NotasModel();
        $data['notas'] = $notasModel->findAll();
        $data['titulo'] = 'IMob - Anotações';
        $data['acao'] = 'Adicionar anotação';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('view_notas_listar', $data);
	}
	
	public function adicionarNotas()
	{
        $data['titulo'] = 'IMob - Anotações';
		$data['acao'] = 'Salvar';
		$data['msg'] = '';
        $data['erros'] = '';

		if($this->request->getMethod() == 'post') {
            $notas = new \App\Models\NotasModel();
            $notas->set('ds_nota', $this->request->getPost('ds_nota'));
            $notas->set('nm_responsavel', $this->request->getPost('nm_responsavel'));
            $notas->set('tp_nota', $this->request->getPost('tp_nota'));
            
            if($notas->insert()) {
                //deu certo
                $data['msg'] = 'Inserido com sucesso';
            }
            else {
                //nao deu certo
                $data['msg'] = 'Erro ao inserir';
                $data['erros'] = $notas->errors();
            }
		}
		return view('view_notas_adicionar', $data);
	}

	public function confirmarExcluirNota($id_nota)
	{
        if(is_null($id_nota)) {
            //redirecionar para a view de usuários - 'view_list_estoque'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('agenda-notas'));
        }
        $data['id_nota'] = $id_nota;
        $data['titulo'] = 'IMob - Anotações';
        return view('view_delete_nota', $data);
    }
	
	public function excluirNota($id_nota = null)
    {
        if(is_null($id_nota)) {
            //redirecionar para a view de usuários - 'view_list_usuario'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Nota não encontrada');
            return redirect()->to(base_url('agenda-notas'));
        }
        $data['titulo'] = 'IMob - Anotações';
        $data['acao'] = 'Excluir';

        $notasModel = new \App\Models\NotasModel();
        if($notasModel->delete($id_nota)) {
            $this->session->setFlashdata('msg', 'Nota excluída com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir nota');
        }

        return redirect()->to(base_url('agenda-notas'));
	}
}
