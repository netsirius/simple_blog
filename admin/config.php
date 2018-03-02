<?php
// definimos constante RUTA
define('RUTA', 'http://localhost/curso_php/simple_blog/');

$db_config = array(
    'bbdd' => 'simple_blog',
    'user' => 'root',
    'pass' => ''
);

$blog_config = array(
    'posts_per_page' => '2',
    'image_folder' => 'images/'
);

//Guardamos aqui datos administrador en vez de crear una tabla en la bbdd
$blog_admin = array(
    'user' => 'admin',
    'pass' => 'admin'
);
?>