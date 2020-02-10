<?php
session_start();


function msg($name = '', $message = '', $class = 'alert alert-success'){
  if(!empty($name)){
    if(!empty($message) and empty($_SESSION[$name])){
      if(!empty($_SESSION[$name])){
        unset($_SESSION[$name]);
      }
      if(!empty($_SESSION[$name.'_class'])){
        unset($_SESSION[$name.'_class']);
      }
      $_SESSION[$name] = $message;
      $_SESSION[$name.'_class'] = $class;
    } else if(empty($message) and !empty($_SESSION[$name])){
      $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
      echo '<div class="'.$class.'">'.$_SESSION[$name].'</div>';
      unset($_SESSION[$name]);
      unset($_SESSION[$name.'_class']);
    }
  }
}

