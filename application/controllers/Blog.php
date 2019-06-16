<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function index() {
		$this->load->model("BlogModel");
		$token = 'adf3a6e2a05f3eb7ef87dae48fdcd9c747ced369';
		$data = $this->BlogModel->blog($token);
		$this->load->view('blog', $data);
	}
}
