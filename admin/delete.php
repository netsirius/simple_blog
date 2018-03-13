<?php 

session_start();
require 'config.php';
require '../functions.php';

check_session();

$connection = connection($db_config);
if(!$connection){
    header('Location: ../error.php');
}

//obtenemos el id del post a borrar
$id = limpiarDatos($_GET['id']);

if(!$id){
    header('Location: ' . RUTA . 'admin');
}

$statement = $connection->prepare(
    'DELETE FROM articulo WHERE id = :id'
);

$statement->execute(array(
    ':id' => $id
));

header('Location: ' . RUTA . 'admin');

?>