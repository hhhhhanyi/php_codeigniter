<?php
  class BlogModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    // public function blog($accessTokend) {
    //   $getIdSQL = 'SELECT id,name FROM user WHERE accessToken = "'.$accessTokend.'"';
    //   $userResult = $this->db->query($getIdSQL);
    //   $id = $userResult->row()->id;
    //   $name = $userResult->row()->name;
    //
    //   $getUserPosts = 'SELECT * FROM post WHERE userId = "'.$id.'"';
    //   $posts = $this->db->query($getUserPosts);
    //   return $posts->row() ;
    //
    // }

  }
