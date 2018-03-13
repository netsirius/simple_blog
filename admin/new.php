<?php

session_start();
require 'config.php';
require '../functions.php';

check_session();

$connection = connection($db_config);
if(!$connection){
    header('Location: ../error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = limpiarDatos($_POST['title']);
    $extracto = limpiarDatos($_POST['extracto']);
    $text = $_POST['text'];
    $thumb = $_FILES['thumb']['tmp_name'];

    $upload_file = '../' . $blog_config['image_folder'] . $_FILES['thumb']['name'];

    move_uploaded_file($thumb, $upload_file);

    $statement = $connection->prepare(
        'INSERT INTO articulo (id, titulo, extracto, texto, thumb)
        VALUES (null, :titulo, :extracto, :texto, :thumb)'
    );

    $statement->execute(array(
        ':titulo' => $title,
        ':extracto' => $extracto,
        ':texto' => $text,
        ':thumb' => $_FILES['thumb']['name']
    ));

    header('Location: ' . RUTA . '/admin');
}

require '../views/new.view.php'
?>