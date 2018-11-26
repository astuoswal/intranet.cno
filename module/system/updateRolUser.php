<?php
    require_once '../autoload_class.php';
    require_once '../validate_session.php';

    $con = new db();

    if(isset($_POST["indicador"]))
    {
        
        $query = 'UPDATE usuario SET id_rol ="'.$_POST['value'].'" WHERE indicador ="'.$_POST["indicador"].'"';
        $result=$con->query($query);
        if ($result) {
            echo "Rol de usuario actualizado";
        }
    }