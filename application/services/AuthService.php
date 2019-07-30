<?php

class AuthService
{
	/**
	 * @var bool
	 */
	protected $guest = true;

	/**
	 * @var array
	 */
	protected $user = [
		'id' => null,
		'name' => null
	];

	/**
	 * AuthService constructor.
	 * @param $session
	 */
	public function __construct($session, $userModel)
	{
		$this->authenticate($session, $userModel);
	}

	/**
	 * @return bool
	 */
	public function guest()
	{
		return $this->guest;
	}

	/**
	 * @return bool
	 */
	public function check()
	{
		return !$this->guest;
	}

	/**
	 * @return mixed
	 */
	public function id()
	{
		if ($this->guest) {
			return null;
		}

		return $this->user['id'];
	}

	/**
	 * @return mixed
	 */
	public function name()
	{
		if ($this->guest) {
			return null;
		}

		return $this->user['name'];
	}

	/**
	 * @param $session
	 */
	protected function authenticate($session, $userModel)
	{
		if (!$session->ci_session_key_generate && !$session->auth) {
			return;
		}


		$this->guest = false;

		$this->user = $session->auth;
	}
}
