<?php

class Auth extends MY_Controller
{
	/**
	 * Auth constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('UserModel', 'user');
		$this->load->library('form_validation');
	}

	/**
	 * Register form
	 */
	public function register()
	{
		if ($this->auth->check()) {
			redirect('/');
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('auth/register', $this->data);
		$this->load->view('templates/footer');
	}

	/**
	 * Register
	 */
	public function actionCreate()
	{
		if ($this->auth->check()) {
			redirect('/');
		}

		// Validate
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

		if (!$this->form_validation->run()) {
			// validation failed
			$this->register();
			return;
		}

		// create user
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$timeStamp = time();

		$this->user->setName($name);
		$this->user->setEmail($email);
		$this->user->setPassword($password);
		$this->user->setTimeStamp($timeStamp);

		$this->user->create();

		redirect('/login');
	}

	/**
	 * Login Form
	 */
	public function showLoginForm()
	{
		if ($this->auth->check()) {
			redirect('/');
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('auth/login', $this->data);
		$this->load->view('templates/footer');
	}

	/**
	 * Login
	 */
	function login()
	{
		if ($this->auth->check()) {
			redirect('/');
		}

		// Validate
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

		if (!$this->form_validation->run()) {
			// validation failed
			$this->showLoginForm();
			return;
		}

		// authenticate credentials
		$user = $this->user->authenticate(
			$this->input->post('email'),
			$this->input->post('password')
		);

		if (empty($user)) {
			// authentication failed
			$this->data['msg'] = 1;
			redirect('/login');
		}

		// add auth info to session
		$this->session->set_userdata('ci_session_key_generate', true);

		$this->session->set_userdata('auth', [
			'id' => $user->id,
			'name' => $user->name
		]);

		redirect('/news');
	}

	/**
	 * Logout
	 */
	public function logout()
	{
		if ($this->auth->guest()) {
			redirect('/');
		}

		// clear auth session data
		$this->session->unset_userdata('ci_session_key_generate');
		$this->session->unset_userdata('auth');
		$this->session->sess_destroy();
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");

		redirect('/');
	}
}
