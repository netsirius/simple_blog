<?php 
session_start();
require 'admin/config.php';
require 'functions.php';
// Miramos se se ha enviado el usuario y pass
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // guardamos y limpiamos lo que nos llega
    $user =  limpiarDatos($_POST['user']);
    $password = limpiarDatos($_POST['password']);

    if($user == $blog_admin['user'] && $password == $blog_admin['pass']){
        $_SESSION['admin'] = $blog_admin['user'];
        header('Location: ' . RUTA . 'admin');
    }
}

require 'views/login.view.php';
?>