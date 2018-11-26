<?php

class login extends db {

    private $indicator;
    private $password;
    private $name;
    private $lastname;
    private $email;
    private $newpassword;

    //Todos los metodos con Set toma el valor de los campos a trabajar
    public function SetIndicator(string $indicator)
    {
        $this->indicator= filter_var($indicator, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    }
    
    public function SetPassword(string $password) 
    {  
        $this->password= password_hash($password, PASSWORD_DEFAULT);
    }
    //Verifica una contraseña hasheada
    public function passwordVerify($password, $passdb)
    {
        return password_verify($password, $passdb);
         
    }
    //Actualiza la contraseña en la base de datos
    public function passwordUpdate($password)
    {
        $row= parent::row("UPDATE `usuario` SET `password`=:pass WHERE `id_user`=:id", array("pass"=>"$this->password", "id"=>"$this->indicator"));
        return $row;
    }

    //Datos de Active Directory
    public function SetName(string $name)
    {
        $this->name= $name;
    }
    public function SetLastname(string $lastname) 
    {
        $this->lastname= $lastname;
    }
    public function SetEmail(string $email) 
    {
        $this->email= $email;
    }

    //Realiza una consulta de seleccion a travez del indicador
    public function getRowID()
    {
        $row= parent::row("SELECT * FROM usuario WHERE indicador = :indicador", array("indicador"=>"$this->indicator"));
        return $row;
    }

    public function statusVerify($status)
    {
        if ($status = "deshabilitado") {
            return true;
        }
        return false;
    }

    //Agregar un usuario a la base de datos
    public function AddUser()
    {
        $row= parent::row("INSERT INTO `usuario`( `indicador`, `nombre`, `apellido`, `correo`, `password`) VALUES ('$this->indicator','$this->name','$this->lastname','$this->email','$this->password')");
        return $row;
    }
    
    //Realiza el inicio de sesion
    public function SignIn()
    {
        //Toma la consulta y la convierte en un arreglo
        $row = $this->getQueryResult()->fetch_array(MYSQLI_ASSOC);
            //Valida si fue afectada una fila
            //Valida si el password es correcto
            if ($this->passwordVerify($row['password'])) {
                    //Valida si la contraseña necesita un rehash
                if (password_needs_rehash($row['password'], PASSWORD_DEFAULT)) {
                    // Realiza un rehash en la contraseña y actualiza en la base de datos
                    $this->passwordUpdate($this->password);                    
                }
                return $row;
            }
        if ($this->isAffectedRows()) {
        } return false;
    }

}
?>