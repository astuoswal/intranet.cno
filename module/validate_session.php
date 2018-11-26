<?php 
    $session = new session();
    if (! $session->validateSession('id')) {
    header('location: login.php?message=Debes iniciar sesión&type=Infomessage');
}