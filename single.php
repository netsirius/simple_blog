<?php
require 'admin/config.php';
require 'functions.php';

$connection = connection($db_config);
$article_id = article_id($_GET['id']);

if(!$connection){
    header('Location: error.php');
}

if(empty($article_id)){
    header('LOcation: index.php');
}

$post = get_post_by_id($connection, $article_id);

if(!$post){
    header('Location: index.php');
}
//Ya que nos devuelve un array dentro d eun array
$post = $post[0];

require 'views/single.view.php';
?>