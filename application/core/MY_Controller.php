<?php

include_once(APPPATH . '/services/AuthService.php');

class MY_Controller extends CI_Controller
{
	/**
	 * @var AuthService
	 */
	protected $auth;

	/**
	 * @var array
	 */
	protected $data = [];

	/**
	 * MY_Controller constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('UserModel', 'userModel');

		$auth = new AuthService(
			$this->session,
			$this->userModel
		);

		$this->auth = $auth;
		$this->data['auth'] = $auth;
	}
}
