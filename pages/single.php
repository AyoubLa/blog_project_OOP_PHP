<?php 

$post = App\Table\Article::getPost($_GET['post']);

?>

<h1><?= $post->title; ?></h1>

<p><?= $post->content; ?></p>