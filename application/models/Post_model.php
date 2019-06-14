<?php
  class Post_model extends CI_Model{
    // function __construct(argument){
    //   $this->load->database();
    // }

    public function get_post(){
      $query = $this->db->get('post');
      return $query->row_array();
    }
  }
