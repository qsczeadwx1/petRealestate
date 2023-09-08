<?php

spl_autoload_register( function($path) {
    $path = str_replace("\\", "/", $path); //   "\"를 "/"로 변환


    require_once($path._EXTENSION_PHP);


});

?>