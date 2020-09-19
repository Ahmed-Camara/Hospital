<?php

    require_once 'config/Config.php';
    require_once 'helpers/functions.php';
    require_once 'helpers/sessions.php';
    spl_autoload_register(function($className){

        require_once 'libraries/'. $className .'.php';
    });
?>