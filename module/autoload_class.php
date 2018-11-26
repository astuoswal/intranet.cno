<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/intranet.cno/config/config.php';
    spl_autoload_register(function ($class) {
        if(in_array($class, NORMAL_CLASS))
            return require DIR . "/intranet.cno/module/class/$class/$class.class.php";
        elseif(strpos($class, 'message') !== false)
            require DIR . "/intranet.cno/module/class/message/$class.class.php";
    });