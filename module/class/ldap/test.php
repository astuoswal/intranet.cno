<?php
include '../../../config/config.php';
include 'ldap.class.php';

$ldap = new Ldap();
$ldap->setIndicator('administrador');
$ldap->setPassword('CNOadmin201220171');

$connect = $ldap->connect();

$bind = $ldap->ldapBind();

$search = $ldap->ldapSearch();

var_dump($search);


