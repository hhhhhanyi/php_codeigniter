<?php
  class BlogModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function allPosts() {
      $allPosts = 'SELECT * FROM post ORDER BY time desc';
      $posts = $this->db->query($allPosts);
      if($posts->num_rows() > 0) {
        return $posts->result();
      }
    }

    public function singlePost($articleID) {
      $singlePost = 'SELECT post.*, user.name FROM post LEFT JOIN user ON post.userId = user.id WHERE post.id = "'.$articleID.'"';
      $post = $this->db->query($singlePost);
      return $post->row();
    }

    public function userPosts($userId) {
      $userPosts = 'SELECT * FROM post WHERE userId = "'.$userId.'" ORDER BY time desc';
      $posts = $this->db->query($userPosts);
      if($posts->num_rows() > 0) {
        return $posts->result();
      }
    }
  }
