<?php 

if (!isset($_SESSION["ID"])) {
    header("location: template/views/login.php");
} else {
    header("location: template/views/home.php");
}
