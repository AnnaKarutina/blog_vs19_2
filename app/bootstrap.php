<?php
// laadime vajalikud konstandid
require_once 'config/constants.php';
// abifunktsioonid - helpers
require_once 'helpers/url_helper.php';
// session
session_start();
// laadime vajalikud raamatukogud
spl_autoload_register(function ($className) {
  require_once 'libraries/'.$className.'.php';
});
