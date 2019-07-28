<?php

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('newsModel');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['news'] = $this->newsModel->getNews();
        $data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');

        } else {
            $this->news_model->setNews();
            $this->load->view('news/success');
        }
    }



    public function view($slug = NULL)
    {
        $data['newsItem'] = $this->newsModel->getNews($slug);

        if (empty($data['newsItem'])) {
            show_404();
        }

        $data['title'] = $data['newsItem']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
}
