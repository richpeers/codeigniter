<?php

class Pages extends MY_Controller
{
	/**
	 * @param string $page
	 */
	public function view($page = 'home')
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}

		$data['title'] = ucfirst($page);

		$this->load->view('templates/header', $this->data);
		$this->load->view('pages/' . $page, $this->data);
		$this->load->view('templates/footer', $this->data);
	}
}
