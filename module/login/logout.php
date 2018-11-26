<?php
    require_once '../autoload_class.php';
    require_once '../validate_session.php';

    $session->destroySession();

    header('location: ../../template/views/login.php')

?>