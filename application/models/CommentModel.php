<?php
  class CommentModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function write($postId, $userId, $content, $time) {
      $this->db->insert("comment",
        Array(
        "postId" =>  $postId,
        "userId" => $userId,
        "content" => $content,
        "time" => $time
      ));
      return $postId;
    }

    public function getComment($articleId) {
      $getComment = 'SELECT comment.*, user.name FROM comment LEFT JOIN user ON comment.userId = user.id WHERE comment.postId = "'.$articleId.'"';
      $comment = $this->db->query($getComment);
      return $comment->result();

      // $this->db->select("*");
      // $this->db->from("comment");
      // $this->db->where("postId", $articleId);
      // $comment = $this->db->get();
      // return $comment->result();
    }

  }
