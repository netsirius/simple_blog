<?php

session_start();
session_destroy();
// reiniciamos el array de sessiones
$_SESSION = array();

header('Location: ../');
die();

?>