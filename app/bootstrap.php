<?php
// laadime vajalikud konstandid
require_once 'config/constants.php';
// laadime vajalikud raamatukogud
spl_autoload_register(function ($className) {
  require_once 'libraries/'.$className.'.php';
});
