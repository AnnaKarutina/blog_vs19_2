<?php


class Posts extends Controller
{
  /**
   * Page constructor.
   */
  public function __construct()
  {
    $this->postModel = $this->model('Post');
  }

  public function index() {
    $posts = $this->postModel->getPosts();
    $data = array(
      'posts' => $posts
    );
    $this->view('posts/index', $data);
  }
}