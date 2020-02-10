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
}