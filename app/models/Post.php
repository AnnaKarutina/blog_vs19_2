<?php


class Post
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getPosts(){
    $this->db->query('SELECT * FROM posts');
    $posts = $this->db->getAll();
    return $posts;
  }

  public function getPostById($id){
    $this->db->query('SELECT * FROM posts WHERE post_id=:id');
    $this->db->bind(':id', $id);
    $post = $this->db->getOne();
    return $post;
  }
}