<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
	public function index() {
		$this->load->view('comment');
	}

	public function article($articleID = null) {
		$data['id'] = $articleID;
		$this->load->view('comment', $data);
	}

	public function write($articleID = null) {
    session_start();
		if (isset($_SESSION["accessToken"]) && $_SESSION["accessToken"] != null) {
			$content = $this->input->post("content");
			if ($content == "") {
				$this->load->view('comment', Array(
					"errorMessage" => "請確實填寫所有欄位。"
				));
				return false;
			}
			$this->load->model("UserModel");
			$accessToken = $_SESSION["accessToken"];
			if ($this->UserModel->checkUser($accessToken)) {
				$userId = $this->UserModel->checkUser($accessToken)->id;
				$content = $this->input->post("content");
				$time = time();
				$this->load->model("CommentModel");
				$result = $this->CommentModel->write($articleID, $userId, $content, $time);
				redirect(site_url("blog/article/".$result));
			} else {
				redirect(site_url("/user"));
			}
		} else {
			redirect(site_url("/user"));
		}
	}
}
