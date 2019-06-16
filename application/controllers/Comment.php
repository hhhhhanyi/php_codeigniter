<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
	public function index($articleID = null) {
		$this->load->view('comment');
	}

	public function write($articleID = null) {
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
			$this->load->model("CommentModel");
			$accessToken = $_SESSION["accessToken"];
			if ($this->PostModel->checkUser($accessToken)) {
				$userId = $this->PostModel->checkUser($accessToken)->id;
				$time = time();
				$result = $this->PostModel->write($title, $content, $time, $userId);
				redirect(site_url("blog/article/".$result));
			} else {
				redirect(site_url("/user"));
			}
		} else {
			redirect(site_url("/user"));
		}
	}

}
