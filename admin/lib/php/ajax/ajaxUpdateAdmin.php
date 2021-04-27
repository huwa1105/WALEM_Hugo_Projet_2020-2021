<?php
header('Content-Type: application/json');

include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Admin.class.php');
include ('../classes/AdminBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);
$us = array();
$users = new AdminBD($cnx);

extract($_GET,EXTR_OVERWRITE);
$us[] = $users->updateAdmin($champ,$id,$nouveau);

