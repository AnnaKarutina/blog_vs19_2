<?php


class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }
  public function findUserByEmail($email){
    $this->db->query('SELECT * FROM users WHERE user_email = :email');
    $this->db->bind(':email', $email);
    $row = $this->db->getOne();

    if($this->db->rowCount() > 0){
      return true;
    } else {
      return false;
    }
  }

  public function register($data){
    $this->db->query('INSERT INTO users SET user_name=:name, 
                                                user_email=:email, 
                                                user_password=:password');
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);

    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

}