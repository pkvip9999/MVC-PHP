<?php

class User extends Paginate{

	protected $user_id = null;
	protected $user_fullname = null;
	protected $user_email = null;
	protected $user_level = null;
	protected $user_password = null;

	protected $table = "vp_users";

	public function __construct()
	{
		$this->connect();
	}

	public function setUserEmail($email)
	{
		$this->user_email = $email;
	}

	public function setPassword($password)
	{
		$this->user_password = $password;
	}

	public function setFullname($fullname)
	{
		$this->user_fullname = $fullname;
	}

	public function setLevel($level)
	{
		$this->user_level = $level;
	}


	public function login()
	{

		$sql = "SELECT * FROM $this->table WHERE user_email = '$this->user_email' AND user_password = '$this->user_password'";
		
		$this->query($sql);

		if ($this->numRow() > 0) {

			$_SESSION['user_email'] = $this->user_email;

		} else {

			return 'faild';

		}

	}

	
	public function getAllUser()
	{
		$sql = "SELECT * FROM $this->table";
		$this->query($sql);
	}


	public function edit($id)
	{

		$sql = "SELECT * FROM $this->table WHERE user_email = '$this->user_email' AND user_id != $id";
		$this->query($sql);
		if ($this->numRow() > 0) {
		
			return 'faild';

		} else {

		$sql = "UPDATE $this->table SET 
			user_fullname = '$this->user_fullname', 
			user_password  = '$this->user_password',
			user_email = '$this->user_email',

			  WHERE user_id = $id";
			$this->query($sql);

		}
	
	}

	public function getUser($id)
	{

		$sql = "SELECT * FROM $this->table WHERE user_id = $id";
		$this->query($sql);

	}

	public function add()
	{

		$sql = "SELECT * FROM $this->table WHERE user_email = '$this->user_email' ";
		$this->query($sql);
		if ($this->numRow() > 0) {
			return 'faild';
		} else {

			$sql = "INSERT INTO $this->table 
			(user_email, user_password, user_fullname) 
			VALUES 
			('$this->user_email', '$this->user_password', '$this->user_fullname')";

			$this->query($sql);
		}	

	}

	public function delete($id)
	{

		$sql = "DELETE FROM $this->table WHERE user_id = $id";
		$this->query($sql);

	}

	public function getUserId($id)
	{

		$sql = "SELECT * FROM $this->table WHERE user_id = $id";
		$this->query($sql);

	}

}
