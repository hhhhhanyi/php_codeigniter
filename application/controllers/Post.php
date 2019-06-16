<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
	public function index() {
		$this->load->view('post');
	}

	public function write() {
		session_start();
		if (isset($_SESSION["accessToken"]) && $_SESSION["accessToken"] != null) {
			$this->load->model("PostModel");
			$accessToken = $_SESSION["accessToken"];
			if ($this->PostModel->checkUser($accessToken)) {
				$userId = $this->PostModel->checkUser($accessToken)->id;
				$title = $this->input->post("title");
				$content = $this->input->post("content");
				$time = time();
				$result = $this->PostModel->write($title, $content, $time, $userId);
			} else {
				$this->load->view('post', Array(
					"errorMessage" => '您尚未登入，請先登入！'
				));
				return false;
			}
		} else {
			$_SESSION["accessToken"] = 'dewdew';
			$this->load->view('user', Array(
				"errorMessage" => '您尚未登入，請先登入！'
			));
		}
	}
}
