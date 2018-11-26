<?php
    require_once '../autoload_class.php';
    require_once '../validate_session.php';

    function get_total_all_records()
    {
        $con = new db();
        $result = $con->query("SELECT * FROM usuario");
        
        return $con->sSQL->rowCount();
    }

    $query = '';
    

    $query .= 'SELECT usuario.indicador, usuario.nombre, usuario.apellido, usuario.id_rol, usuario_roles.nombre_rol FROM usuario INNER JOIN usuario_roles ON usuario_roles.id_rol=usuario.id_rol ';

    if(isset($_POST["search"]["value"]))
    {
        $query .= 'WHERE usuario.nombre LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR usuario.apellido LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR usuario_roles.nombre_rol LIKE "%'.$_POST["search"]["value"].'%" ';
    }
    if(isset($_POST["order"]))
    {
        $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
        $query .= 'ORDER BY usuario.nombre ASC ';
    }
    if(isset($_POST["length"]) and $_POST["length"] != -1)
    {
        $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $con= new db();
    $result=$con->query($query);
    $data = array();
    $output = array();
    $filtered_rows = $con->sSQL->rowCount();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row['indicador'];
        $sub_array[] = $row['nombre'];
        $sub_array[] = $row['apellido'];
        $sub_array[] = '<div>
                            <select class="update selectRol" data-indicador="'.$row["indicador"].'" data-column="id_rol">
                                <option selected value='. $row["id_rol"] .'>'. $row["nombre_rol"] .'</option>
                            </select>
                        </div>';

        $data[] = $sub_array; 
    }

    $output = array(
        "sEcho"=>intval($_POST["draw"]),
        "recordsTotal"=>$filtered_rows,
        "recordsFiltered"=>get_total_all_records(),
        "data"=>$data
    );

    echo json_encode($output);
    
    
?>

