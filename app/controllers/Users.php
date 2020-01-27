<?php


class Users extends Controller
{

  /**
   * Users constructor.
   */
  public function __construct()
  {
    $usersModel = $this->model('User');
  }

  public function register(){
    $this->view('users/register');
  }
}