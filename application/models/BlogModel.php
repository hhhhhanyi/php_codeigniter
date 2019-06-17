<?php
  class BlogModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function allPosts() {
      $allPosts = 'SELECT * FROM post';
      $posts = $this->db->query($allPosts);
      if($posts->num_rows() > 0) {
        return $posts->result();
      }
    }

    public function checkUser($accessToken) {
      $this->db->select("*");
      $this->db->from("user");
      $this->db->where("accessToken", $accessToken);
      $query = $this->db->get();
      return $query->row();
    }

    public function getPost($articleID) {
      $getPost = 'SELECT post.*, user.name FROM post LEFT JOIN user ON post.userId = user.id WHERE post.id = "'.$articleID.'"';
      $post = $this->db->query($getPost);
      return $post->row();
    }

  }
