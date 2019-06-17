<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function index() {
		$this->load->model("BlogModel");
		$article = $this->BlogModel->allPosts();
		$this->load->view('blog', Array("article" => $article));
	}

	public function article($articleID = null) {
		if ($articleID == null) {
			show_404("Article not found !");
			return true;
		}
		$this->load->model("BlogModel");
		$article = $this->BlogModel->singlePost($articleID);
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
			$this->load->model("BlogModel");
			$accessToken = $_SESSION["accessToken"];
			if($this->BlogModel->checkUser($accessToken)){
				$userId = $this->BlogModel->checkUser($accessToken)->id;
				$article = $this->BlogModel->userPosts($userId);
				$this->load->view('author', Array("article" => $article));
			} else {
				redirect(site_url("/user"));
			}
		} else {
			redirect(site_url("/user"));
		}
	}
}
