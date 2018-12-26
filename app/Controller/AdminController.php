<?php
class AdminController extends Controller {

	public function __construct()
	{
		if (!isset($_SESSION['user_email'])) {
			$this->redirect('index.php?controller=login');
		}
	}

	public function index()
	{
		$user = $this->loadModel('User');
		$user->getAllUser();

		$data['page'] = $user->paginate(1);

		$data['users'] = $user->get();

		$this->loadView('admin', $data);
		
	}

	public function add()
	{
		$data = [];

		if (isset($_POST['submit'])) {
			$user = $this->loadModel('User');
			$user->setPassword($_POST['pass']);
			$user->setUserEmail($_POST['mail']);
			$user->setFullname($_POST['full']);

			if ($user->add() == 'faild') {
				$data['error'] = "Email đã tồn tại";
			} else {
				$_SESSION['success'] ="Thêm thành công";
				$this->redirect('index.php?controller=admin');
			}
		}

		$this->loadView('add', $data);
	}


	public function edit()
	{

		$user = $this->loadModel('User');
		$user->getUserId($_GET['id']);
		$data['user'] = $user->first();

		if (isset($_POST['submit'])) {
			
			$user->setPassword($_POST['pass']);
			$user->setUserEmail($_POST['mail']);
			$user->setFullname($_POST['full']);

			if ($user->edit($_GET['id']) == 'faild') {
				$data['error'] = "Email đã tồn tại";
			} else {
				$_SESSION['success'] ="Cập nhật thành công";
				$this->redirect('index.php?controller=admin');
			}
		}

		$this->loadView('edit', $data);
	}

	public function delete()
	{
		$user = $this->loadModel('User');
		$user->delete($_GET['id']);
		$_SESSION['success'] ="Xóa thành công";
		$this->redirect('index.php?controller=admin');
	}

}