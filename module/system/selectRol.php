<?php
    require_once '../autoload_class.php';
    require_once '../validate_session.php';

    function selectRol(){
        $con = new db();
        $query = "SELECT * FROM usuario_roles";
        $result=$con->query($query);
        foreach ($result as $row) {
            echo '<option value='. $row["id_rol"] .'>'. $row["nombre_rol"] .'</option>';
        }
    }

    selectRol();
?>
