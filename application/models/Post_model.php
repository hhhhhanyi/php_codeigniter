<?php
  class Post_model extends CI_Model {
    public function __construct() {
      $this->load->database();
    }
    public function get_post() {
      $query = $this->db->get_where('post');
      return $query->row_array();
    }
  }
