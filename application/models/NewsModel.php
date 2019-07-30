<?php

class NewsModel extends CI_Model
{
	/**
	 * NewsModel constructor.
	 */
	public function __construct()
	{
		Parent::__construct();
		$this->load->database();
	}

	/**
	 * @param bool $slug
	 * @return mixed
	 */
	public function getNews($slug = FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db->get('news');
			return $query->result_array();
		}

		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}

	/**
	 * @return mixed
	 */
	public function setNews()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		return $this->db->insert('news', [
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text')
		]);
	}
}
