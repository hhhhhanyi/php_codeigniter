<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
	public function index() {
		$this->load->view('post');
	}

	public function write() {
		session_start();
		if (isset($_SESSION["accessToken"]) && $_SESSION["accessToken"] != null) {
			$title = $this->input->post("title");
			$content = $this->input->post("content");
			if ($title == "" || $content == "") {
				$this->load->view('post', Array(
					"errorMessage" => "請確實填寫所有欄位。"
				));
				return false;
			}
			$this->load->model("UserModel");
			$accessToken = $_SESSION["accessToken"];
			if ($this->UserModel->checkUser($accessToken)) {
				$userId = $this->UserModel->checkUser($accessToken)->id;
				$time = time();
				$this->load->model("PostModel");
				$result = $this->PostModel->write($title, $content, $time, $userId);
				redirect(site_url("blog/article/".$result));
			} else {
				redirect(site_url("/user"));
			}
		} else {
			redirect(site_url("/user"));
		}
	}

	public function edit($articleID = null) {
		if ($articleID == null) {
			show_404("Article not found !");
			return true;
		}
		session_start();
		if (isset($_SESSION["accessToken"]) && $_SESSION["accessToken"] != null) {
			$this->load->model("UserModel");
			$accessToken = $_SESSION["accessToken"];
			if ($this->UserModel->checkUser($accessToken)) {
				$userId = $this->UserModel->checkUser($accessToken)->id;
				$this->load->model("PostModel");
				if ($this->PostModel->checkArticle($articleID, $userId)) {
					$title = $this->input->post("title");
					$content = $this->input->post("content");
					$time = time();
					$this->load->model("PostModel");
					$result = $this->PostModel->edit($title, $content, $time, $articleID, $userId);
					redirect('/blog/article/'.$articleID);
				} else {
					show_404("Article not found !");
					return true;
				}
			} else {
				redirect(site_url("/user"));
			}
		} else {
			redirect(site_url("/user"));
		}
	}

	public function delete($articleID = null) {
		if ($articleID == null) {
			show_404("Article not found !");
			return true;
		}
		session_start();
		if (isset($_SESSION["accessToken"]) && $_SESSION["accessToken"] != null) {
			$this->load->model("UserModel");
			$accessToken = $_SESSION["accessToken"];
			if ($this->UserModel->checkUser($accessToken)) {
				$userId = $this->UserModel->checkUser($accessToken)->id;
				$this->load->model("PostModel");
				if ($this->PostModel->checkArticle($articleID, $userId)) {
					$this->load->model("PostModel");
					$result = $this->PostModel->delete($articleID, $userId);
					redirect('/');
				} else {
					show_404("Article not found !");
					return true;
				}
			} else {
				redirect(site_url("/user"));
			}
		} else {
			redirect(site_url("/user"));
		}
	}


	public function article($articleID = null) {
		if ($articleID == null) {
			show_404("Article not found !");
			return true;
		}
		session_start();
		if (isset($_SESSION["accessToken"]) && $_SESSION["accessToken"] != null) {
			$accessToken = $_SESSION["accessToken"];
			$this->load->model("UserModel");
			if ($this->UserModel->checkUser($accessToken)) {
				$userId = $this->UserModel->checkUser($accessToken)->id;
				$this->load->model("PostModel");
				if ($this->PostModel->checkArticle($articleID, $userId)) {
					$this->load->model("BlogModel");
					$article = $this->BlogModel->singlePost($articleID);
					if ($article) {
						$this->load->view('edit' , $article);
					} else {
						show_404("Article not found !");
						return true;
					}
				} else {
					show_404("Article not found !");
					return true;
				}
			} else {
				redirect(site_url("/user"));
			}
		} else {
			redirect(site_url("/user"));
		}
	}

}
