<?php
if (!isset($_POST['submit'])){
    header('location: ../../template/views/login.php');
    exit();
} else {
    require_once '../autoload_class.php';

    $indicator = trim($_POST['inputID']);
    $password = trim($_POST['inputPassword']);

    if (empty($indicator) or empty($password)) {
        header('location: ../../template/views/login.php?message=El indicador o la contraseña se encuentran vacios&type=Warningmessage');
    } else {
        $login = new login();
        $login->SetIndicator($indicator);
        $login->SetPassword($password);
        $rowID = $login->getRowID();
        function singIn($password,$indicator)
        {
            $login = new login();
            $login->passwordUpdate($password) ;
            $session = new session();
            $session->addValue('id',$indicator);
            $session->addValue('departamento',$rowID['id_departamento']);
            $session->addValue('rol',$rowID['id_rol']);
        
            header('location: ../../template/views/home.php');
        }

        $ad = new ldap();
        if (!$ad->connect()) {
            if (!$rowID) {
                header('location: ../../template/views/login.php?message=Indicador no se encuentra en nuestra base de datos. Verifique y vuelva intentar, si persiste con el problema comunicarse con el departamento TIC&type=Dangermessage');
            } else {
                $pass = $login->passwordVerify($password, $rowID['password']);
                if (!$pass) {
                    header('location: ../../template/views/login.php?message=Contraseña incorrecta. Vuelva a intentarlo&type=Warningmessage');
                } else {
                    if ($rowID['status']=='deshabilitado') {
                        header('location: ../../template/views/login.php?message=Su usuario se encuentra deshabilitado. Comununicarse con el departamento RRHH&type=Dangermessage');
                    } else {
                        singIn($password,$indicator);
                    }
                }
            }
        } else {
            $ad->setIndicator($indicator);
            $ad->setPassword($password);
            if (!$ad->ldapBind()) {
                header('location: ../../template/views/login.php?message=Usuario o contraseña incorrecto. Intentelo de nuevo&type=Warningmessage');
            } else {
                if (!$rowID) {
                    $rowAD = $ad->ldapSearch();
                    $login->SetName($rowAD[1]);
                    $login->SetLastname($rowAD[2]);
                    $login->SetEmail($rowAD[3]);
                    $row= $login->AddUser();
                    if (!$row) {
                        singIn($password,$indicator);
                    } else {
                        header('location: ../../template/views/login.php?message=Hubo algun problema al iniciar. Comuniquese con el departamento TIC&type=Dangermessage');
                    }
                } else {
                    if ($rowID['status']=='deshabilitado') {
                        header('location: ../../template/views/login.php?message=Su usuario se encuentra deshabilitado. Comununicarse con el departamento RRHH&type=Dangermessage');
                    } else {
                        singIn($password,$indicator);
                    }
                }
            }
        }
    }
}
