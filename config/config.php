<?php

    //Datos de conexion a Active Directory
    define('CONF_DBAD_DOMINIO', 'cno.local');
	define('CONF_DBAD_DN', 'dc=cno,dc=local');
	define('CONF_DBAD_PORT', 389);

    //Directorio raiz
    define('DIR', $_SERVER['DOCUMENT_ROOT']);

    //Clases en carpeta class
    define('NORMAL_CLASS', ['db','ldap','login','session']);