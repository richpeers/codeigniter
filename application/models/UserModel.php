<?php

class UserModel extends CI_Model
{
	// Declaration of a variables
	protected $id;
	protected $name;
	protected $email;
	protected $password;
	protected $timeStamp;

	//Declaration of a methods
	public function setId($id)
	{
		$this->id = $id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function setTimeStamp($timeStamp)
	{
		$this->timeStamp = $timeStamp;
	}

	public function create()
	{
		return $this->db->insert('users', [
			'name' => $this->name,
			'email' => $this->email,
			'password' => $this->hash($this->password),
			'created_at' => $this->timeStamp,
			'modified_at' => $this->timeStamp,
		]);
	}

	public function authenticate($email, $password)
	{
		$this->db->select('id , name, email, password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->limit(1);

		if (!$user = $this->db->get()->result()[0]) {
			return false;
		}

		if (!password_verify($password, $user->password)) {
			return false;
		}

		return $user;
	}

	public function hash($password)
	{
		return password_hash($password, PASSWORD_DEFAULT);
	}
}
