<?php
//Admin index

session_start();
require 'config.php';
require '../functions.php';

$connection = connection($db_config);

//Comprobamos session 
check_session();

if(!$connection){
    header('Location: ../error.php');
}

$posts = obtener_posts($blog_config['posts_per_page'], $connection);

if(!$posts){
    header('Location: ../error.php');
}

require '../views/edit.view.php';
?>