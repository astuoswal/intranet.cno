<?php 
require_once 'module/autoload_class.php';
require_once 'module/validate_session.php';

if (!(isset($_SESSION["id"]))) {
    header("location: template/views/login.php");
} else {
    header("location: template/views/home.php");
}
