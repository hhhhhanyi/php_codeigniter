<?php
  class PostModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function checkArticle($articleId, $userId) {
      $this->db->select("*");
      $this->db->from("post");
      $this->db->where("userId", $userId);
      $this->db->where("id", $articleId);

      $query = $this->db->get();
      return $query->row();
    }

    public function write($title, $content, $time, $userId) {
      $this->db->insert("post",
        Array(
        "title" =>  $title,
        "content" => $content,
        "time" => $time,
        "userId" => $userId
      ));
      return $this->db->insert_id();
    }

    public function edit($title, $content, $time, $articleID, $userId) {
      $data = array(
               'title' => $title,
               'content' => $content,
               'time' => $time
             );
      $this->db->where('id', $articleID);
      $this->db->update('post', $data);
      return $articleID;
    }

    public function delete($articleID, $userId) {
      $this->db->delete('post', array('id' => $articleID));
      return $articleID;
    }

  }
