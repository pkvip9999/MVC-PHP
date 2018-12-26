<?php
class LoginController extends Controller {


	public function __construct()
	{
		if (isset($_SESSION['user_email'])) {

			$this->redirect('index.php?controller=admin');
			
		}
	}


	public function index()
	{

		$this->loadView('login');

	}


	public function login()
	{
		if (isset($_POST['submit'])) {
			$user = $this->loadModel('User');
			$user->setUserEmail($_POST['user']);
			$user->setPassword($_POST['pass']);
			if ($user->login() === 'faild') {

				$this->loadView('login', ['error' => 'Tài khoản không tồn tại']);


			} else {

				$this->redirect('index.php?controller=admin');

			}	
		} else {

			$this->redirect('index.php?controller=login');
			
		}	
		
	}

	public function logout()
	{
		session_destroy();
		$this->redirect('index.php?controller=login');
	}




}