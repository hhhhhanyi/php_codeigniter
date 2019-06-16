<?php
  class PostModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }
    // public function get_post() {
    //   $query = $this->db->get_where('post');
    //   return $query->row_array();
    // }
    public function checkUser($accessToken) {
      $this->db->select("*");
      $this->db->from("user");
      $this->db->where("accessToken", $accessToken);
      $query = $this->db->get();
      return $query->row();
      // if ($query->row()->id) {
      //   return $query->row()->id;
      // } else {
      //   return false;
      // }
    }


    public function write($title, $content, $time, $userId) {
      $this->db->insert("post",
        Array(
        "title" =>  $title,
        "content" => $content,
        "time" => $time,
        "userId" => $userId
      ));
    }
  }
