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

  public function editPost($data){
    $this->db->query('UPDATE posts SET post_title=:title, post_content=:content WHERE post_id=:id');
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':content', $data['content']);
    $result = $this->db->execute();
    if($result){
      return true;
    } else {
      return false;
    }
  }

  public function deletePost($id){
    $this->db->query('DELETE FROM posts WHERE post_id=:id');
    $this->db->bind(':id', $id);
    $result = $this->db->execute();
    if($result){
      return true;
    } else {
      return false;
    }
  }
}