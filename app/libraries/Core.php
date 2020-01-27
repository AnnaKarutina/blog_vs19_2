<?php


class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = array();
  public function __construct()
  {
    $url = $this->getUrl();
    // controller
    if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
      $this->currentController = ucwords($url[0]);
      unset($url[0]);
    }
    require_once '../app/controllers/'.$this->currentController.'.php';
    $this->currentController = new $this->currentController;
    // method
    if(method_exists($this->currentController, $url[1])){
      $this->currentMethod = $url[1];
      unset($url[1]);
    }
    // params
    $this->params = $url ? array_values($url) : array();
    // call a callback function with url parameters - controller, method and params
    call_user_func_array(array($this->currentController, $this->currentMethod), $this->params);
  }

  public function getUrl(){
    if(isset($_GET['url'])){
      $url = $_GET['url'];
      $url = rtrim($url, '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}