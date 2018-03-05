<?php
require 'admin/config.php';
require 'functions.php';

$connection = connection($db_config);
if(!$connection){
    header('Location: error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search'])){
    $search = limpiarDatos($_GET['search']);

    $statement = $connection->prepare(
        'SELECT * FROM articulo WHERE titulo LIKE :search or texto LIKE :search'
    );

    $statement->execute(array(
        // % para que busque en los articulos que tengan dentro nuestra búsqueda
        ':search' => "%$search%"
    ));
    $results = $statement->fetchAll();

    if(empty($results)){
        $title = 'No se han encontrado resultados con: ' . $search;
    }else{
        $titulo = 'Resultados de la búsqueda: ' . $search;
    }
}else{
    header('Location: ' . RUTA . '/index.php');
}

require 'views/search.view.php';

?>