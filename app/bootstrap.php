<?php

class Bootstrap {

	protected $param = [];

	public function __construct()
	{

		$this->getParam();

	}

	public function getParam()
	{

		$get = $_GET;
		$post = $_POST;

		$get['controller'] = $get['controller'] ?? 'login';
		$get['action'] = $get['action'] ?? 'index';

		$this->param = array_merge($get, $post);

	}


	public function run()
	{
		include(LIBRARY.'/Paginate.php');
		include(LIBRARY.'/Controller.php');

		$c_name = ucfirst($this->param['controller']).'Controller';
		$a_name = $this->param['action'];

		require(CONTROLLER.'/'.$c_name.'.php');

		$controller = new $c_name();
		$controller->$a_name();

	}

}