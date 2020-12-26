<?php namespace App\Controllers;

class User extends BaseController
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

	public function listarUsuarios()
	{
        $usersModel = new \App\Models\UsersModel();
        $data['usuarios'] = $usersModel->findAll();
        $data['titulo'] = 'IMob - Usuários';
        $data['acao'] = 'Adicionar usuário';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('view_usuarios_listar', $data);
    }
    
    public function adicionarUsuarios()
	{
        $data['titulo'] = 'IMob - Usuários';
		$data['acao'] = 'Salvar';
		$data['msg'] = '';
        $data['erros'] = '';

		if($this->request->getMethod() == 'post') {
            $users = new \App\Models\UsersModel();
            $users->set('nm_user', $this->request->getPost('nm_user'));
            $users->set('ds_login', $this->request->getPost('ds_login'));
            $users->set('ds_password', MD5($this->request->getPost('ds_password')));
			$users->set('tp_user', $this->request->getPost('tp_user'));
			$users->set('st_user', 'Ativo');
            
            if($users->insert()) {
                //deu certo
                $data['msg'] = 'Inserido com sucesso';
            }
            else {
                //nao deu certo
                $data['msg'] = 'Erro ao inserir';
                $data['erros'] = $users->errors();
            }
		}
		return view('view_usuarios_adicionar', $data);
	}

    public function editarUsuarios($id_user)
    {
        $data['titulo'] = 'IMob - Usuários';
		$data['acao'] = 'Editar';
		$data['msg'] = '';
        $data['erros'] = '';

        $usersModel = new \App\Models\UsersModel();
        $user = $usersModel->find($id_user);

        if($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $user->nm_user = $this->request->getPost('nm_user');
            $user->ds_login = $this->request->getPost('ds_login');
            $user->ds_password = $this->request->getPost('ds_password');
            $user->tp_user = $this->request->getPost('tp_user');
            $user->st_user = 'Ativo';

            if($usersModel->update($id_user, $user)) {
                $data['msg'] = 'Alterado com sucesso';
            }
            else {
                $data['msg'] = 'Erro ao alterar';
                $data['erros'] = $usersModel->errors();
            }
        }

        $data['user'] = $user;
        return view('view_usuarios_adicionar', $data);
	}

	public function confirmarExcluirUsuario($id_user)
	{
        if(is_null($id_user)) {
            //redirecionar para a view de usuários - 'view_list_estoque'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('configuracoes-usuario'));
        }
        $data['id_user'] = $id_user;
        $data['titulo'] = 'IMob - Usuários';
        return view('view_delete_usuario', $data);
    }
	
	public function excluirUsuario($id_user = null)
    {
        if(is_null($id_user)) {
            //redirecionar para a view de usuários - 'view_list_usuario'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Usuário não encontrado');
            return redirect()->to(base_url('configuracoes-usuario'));
        }
        $data['titulo'] = 'IMob - Usuários';
        $data['acao'] = 'Excluir';

        $usersModel = new \App\Models\UsersModel();
        if($usersModel->delete($id_user)) {
            $this->session->setFlashdata('msg', 'Usuário excluído com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir usuário');
        }

        return redirect()->to(base_url('configuracoes-usuario'));
	}
}
