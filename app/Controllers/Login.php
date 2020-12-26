<?php namespace App\Controllers;

class Login extends BaseController
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
		$data['titulo'] = 'Gestão IMob - Login';
		$data['msg'] = '';
		$data['msg'] = $this->session->getFlashdata('msg');
		return view('view_login', $data);
	}
    
	public function validarLogin()
	{        
        if($this->request->getMethod() === 'post') {
            $login = $this->request->getPost('login');
            $password = MD5($this->request->getPost('password')); /* utilizar quando o BD estiver com criptografia MD5 */
			$count = 0;
			$usersModel = new \App\Models\UsersModel();
			$users = $usersModel->find();

			foreach($users as $user) :
				if($user->ds_login == $login && $user->ds_password == $password) {
					$_SESSION['activeUser'] = $user->nm_user;
					$_SESSION['typeUser'] = $user->tp_user;
					$count++;		
				}
			endforeach;
			if($count > 0) {
				return redirect()->to(base_url('principal'));
			}
			else {
				$this->session->setFlashdata('msg', 'Usuário e/ou senha inválidos');
				return redirect()->to(base_url('/'));
			}
		}
	}

	public function logout()
	{
		session_destroy();
		return redirect()->to(base_url('/'));
	}
}