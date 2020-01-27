<?php


class User
{
  private $db;

  /**
   * User constructor.
   */
  public function __construct()
  {
    $this->db = new Database();
  }

}