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
    $first = (actual_page() > 1) ? actual_page() * $posts_per_page - $posts_per_page : 0;
    $statement = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulo LIMIT $first, $posts_per_page");
    $statement->execute();
    return $statement->fetchAll();

}

/**
 * Obtenemos el númeor de paginas para la paginacíon
 */
function get_num_pages($posts_per_page, $connection){
    $total_posts = $connection->prepare('SELECT FOUND_ROWS() as total FROM articulo');
    $total_posts->execute();
    $total_posts = $total_posts->fetch()['total'];
    // redondeamos hacia arriba
    $num_pages = ceil($total_posts / $posts_per_page);
    return $num_pages;
}

/**
 * Obtenemos el post por id
 */

function get_post_by_id($connection, $id){
    $result = $connection->query("SELECT * FROM articulo WHERE id = $id LIMIT 1");
    $result = $result->fetchAll();
    // Si hay resulatdos en la consulta los devolvemos
    return ($result) ? $result : false; 
}

/**
 * Devolvemos el id limpio de inyeccion de codigo, solo permitimos poner 
 * números en la barra de búsqueda
 */
function article_id($id){
    return (int)limpiarDatos($id);
}

function set_date_format($date){
    $timestamp = strtotime($date);
    $months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    // extraemos dia, mes y año
    $day = date('d', $timestamp);
    $month = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);
    
    $date = "$day de " . $months[$month] . " del $year";

    return $date;
}


?>