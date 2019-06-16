<?php
  class BlogModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function allPosts() {
      $allPosts = 'SELECT * FROM post';
      $posts = $this->db->query($allPosts);
      return $posts->row();
    }

    public function checkUser($accessToken) {
      $this->db->select("*");
      $this->db->from("user");
      $this->db->where("accessToken", $accessToken);
      $query = $this->db->get();
      return $query->row();
    }

    public function getPost($articleID) {
      $getPost = 'SELECT * FROM post WHERE id = "'.$articleID.'"';
      $post = $this->db->query($getPost);
      return $post->row();
    }

  }
