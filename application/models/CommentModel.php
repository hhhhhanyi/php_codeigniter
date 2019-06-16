<?php
  class CommentModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function checkUser($accessToken) {
      $this->db->select("id");
      $this->db->from("user");
      $this->db->where("accessToken", $accessToken);
      $query = $this->db->get();
      return $query->row();
    }

    public function write($postId, $userId, $content, $time) {
      $this->db->insert("comment",
        Array(
        "postId" =>  $postId,
        "userId" => $userId,
        "content" => $content,
        "time" => $time
      ));
      return $this->db->insert_id();
    }
  }
