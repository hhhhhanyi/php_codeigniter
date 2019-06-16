<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index() {
		$this->load->view('user');
	}

  public function signup() {
    $email = $this->input->post("email");
    $password = $this->input->post("password");
    $name = $this->input->post("name");
    $accessExpired = time();
    $accessToken = sha1($email.time());

		if (trim($password) == "" || trim($email) == "" || trim($name) == "") {
			$this->load->view('user', Array(
				"errorMessage" => "請確實填妥名稱、帳號與密碼。"
			));
			return false;
		}

		$this->load->model("UserModel");
		if ($this->UserModel->checkUserExist(trim($email))) {
			$this->load->view('user', Array(
				"errorMessage" => "此帳號已經存在。"
			));
			return false;
		}

    $this->UserModel->signin($email, $password, $name, $accessToken, $accessExpired);
		$this->load->view('post');
  }

	public function signin() {
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$accessExpired = time();
		$accessToken = sha1($email.time());

		if(trim($password) == "" || trim($email) == ""){
			$this->load->view('user', Array(
				"errorMessage" => "請確實填妥帳號與密碼。"
			));
			return false;
		}

		$this->load->model("UserModel");
		$result = $this->UserModel->signup($email, $password, $accessToken, $accessExpired);
		if ($result) {
			$this->load->view('user', Array(
				"errorMessage" => $result
			));
		} else {
			session_start();
			$_SESSION["accessToken"] = $accessToken;
			$this->load->view('post');
		}
	}
}
