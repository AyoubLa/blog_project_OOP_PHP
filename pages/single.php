<?php 

use App\App;

use App\Table\Category;

use App\Table\Post;

$post = Post::find($_GET['id']);

$category = Category::find($post->post_category_id);

?>

<h1><?= $post->title; ?></h1>
<p><em><?= $category->name; ?></em></p>
<p><?= $post->content; ?></p>