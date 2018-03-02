<?php

/**
 * Conecxión a la bbdd
 */
function connection($db_config){
    try{
        $connection = new PDO('mysql:host=localhost;dbname='.$db_config['bbdd'],$db_config['user'],$db_config['pass']);
        return $connection;
    }catch(PDOException $e){
        return false;
    }
}

function limpiarDatos($datos){
    //Limpiamos los espacios en blanco al inicio y final con trim
    $datos = trim($datos);
    //Quitamos las barras
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

 /**
  * Limpiar datos, evitando inyección de código
  */


function actual_page(){
    return isset($_GET['page']) ? (int)$_GET['page'] : 1;
}

  /**
   * Traemos los posts por id
   */
function obtener_posts($posts_per_page, $connection){
    $first = (actual_page() > 1) ? actual_page* $posts_per_page - $posts_per_page : 0;
    $statement = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulo LIMIT $first, $posts_per_page");
    $statement->execute();
    return $statement->fetchAll();

}

?>