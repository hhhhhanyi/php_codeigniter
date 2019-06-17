<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function index() {
		$this->load->model("BlogModel");
		$article = $this->BlogModel->allPosts();
		$this->load->view('blog' , Array(
			"article" => $article));
	}

	public function article($articleID = null) {
		if ($articleID == null) {
			show_404("Article not found !");
			return true;
		}
		$this->load->model("BlogModel");
		$article = $this->BlogModel->getPost($articleID);
		if($article){
			$this->load->view('article', $article);
		} else {
			show_404("Article not found !");
			return true;
		}
	}

	public function author() {
		session_start();
		if (isset($_SESSION["accessToken"]) && $_SESSION["accessToken"] != null) {

		}
	}

}
