<?php 

session_start();
require 'config.php';
require '../functions.php';

check_session();

$connection = connection($db_config);
if(!$connection){
    header('Location: ../error.php');
}

//comprobamos que los datos hayan sido enviados
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = limpiarDatos($_POST['title']);
    $extracto = limpiarDatos($_POST['extracto']);
    $text = $_POST['text'];
    $id = limpiarDatos($_POST['id']);
    $saved_thumb = $_POST['saved-thumb'];
    $thumb = $_FILES['thumb'];

    // Si no se ha recibido ninguna foto nueva, mantenemos la imagen ya guardada
    if(empty($thumb['name'])){
        $thumb = $saved_thumb;
    }else{
        //de lo contrario subimos la nueva imagen
        $upload_file = '../' . $blog_config['image_folder'] . $_FILES['thumb']['name'];
        //movemos la imagen al servidor
        move_uploaded_file($_FILES['thumb']['tmp_name'], $upload_file);
        $thumb = $_FILES['thumb']['name'];
    }

    $statement = $connection->prepare(
        'UPDATE articulo SET titulo = :titulo, extracto =:extracto, texto = :texto,
        thumb = :thumb WHERE id = :id'
    );

    $statement->execute(array(
        ':titulo' => $title,
        ':extracto' => $extracto,
        ':texto' => $text,
        ':thumb' => $thumb,
        ':id' => $id
    ));

    header('Location: ' . RUTA . 'admin');

}else{
    // obtenemos el id
    $article_id = article_id($_GET['id']);

    if(empty($article_id)){
        header('Location: ' . RUTA . '/admin');
    }
    //obtenemos el articulo con id obtenido
    $post = get_post_by_id($connection, $article_id);

    if(!$post){
        header('Location: ' . RUTA . 'admin');
    }
    //post es un array dentro de otro y hemos de obtener el que contiene los datos
    $post = $post[0];
}

require '../views/edit.view.php';

?>