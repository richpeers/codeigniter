<?php

class News extends MY_Controller
{
	/**
	 * News constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('newsModel');
		$this->load->helper('url_helper');
	}

	/**
	 * List News
	 */
	public function index()
	{
		$this->data['news'] = $this->newsModel->getNews();

		$this->load->view('templates/header', $this->data);
		$this->load->view('news/index', $this->data);
		$this->load->view('templates/footer');
	}

	/**
	 * Create news
	 */
	public function create()
	{
		if ($this->auth->guest()) {
			redirect('/news');
		}

		$this->load->helper('form');
		$this->load->library('form_validation');

		// Validate
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if (!$this->form_validation->run()) {
			// validation failed
			$this->load->view('templates/header', $this->data);
			$this->load->view('news/create');
			$this->load->view('templates/footer');
			return;
		}

		$this->newsModel->setNews();

		redirect('news');
	}

	/**
	 * View News item
	 *
	 * @param null $slug
	 */
	public function view($slug = NULL)
	{
		$this->data['newsItem'] = $this->newsModel->getNews($slug);

		if (empty($this->data['newsItem'])) {
			show_404();
		}

		$data['title'] = $this->data['newsItem']['title'];

		$this->load->view('templates/header', $this->data);
		$this->load->view('news/view', $this->data);
		$this->load->view('templates/footer');
	}
}
