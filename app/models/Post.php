<?php


class Post
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getPosts(){
    $this->db->query('SELECT *,
                            posts.post_id as postId,
                            users.user_id as userId,
                            posts.post_created as postCreated
                            FROM posts
                            INNER JOIN users
                            ON posts.user_id = users.user_id
                            ORDER BY posts.post_created DESC');
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

  public function addPost($data){
    $this->db->query('INSERT INTO posts (post_title, user_id, post_content) VALUES(:title, :user_id, :content)');
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':content', $data['content']);
    $result = $this->db->execute();
    if($result){
      return true;
    } else {
      return false;
    }
  }
}