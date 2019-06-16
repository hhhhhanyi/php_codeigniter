<?php
  class UserModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function signin($email, $password, $name, $accessToken, $accessExpired) {
        $this->db->insert("user",
          Array(
          "email" =>  $email,
          "password" => $password,
          "name" => $name,
          "accessToken" => $accessToken,
          "accessExpired" => $accessExpired
        ));
    }

    public function checkUserExist($email) {
        $this->db->select("COUNT(*) AS users");
        $this->db->from("user");
        $this->db->where("email", $email);
        $query = $this->db->get();
        return $query->row()->users > 0 ;
    }

    public function signup($email, $password, $accessToken, $accessExpired) {
      $sql = 'SELECT COUNT(*) AS users FROM user WHERE email = "'.$email.'" && password = "'.$password.'"';
      $result = $this->db->query($sql);

      if ($result->row()->users == 1) {
        $sql = 'UPDATE user SET accessToken = "'.$accessToken.'", accessExpired = "'.$accessExpired.'" WHERE email = "'.$email.'"';
        $result = $this->db->query($sql);
      } else {
        $error = "帳號密碼輸入錯誤，請重新輸入。";
        return $error;
      }
    }

    
  }
