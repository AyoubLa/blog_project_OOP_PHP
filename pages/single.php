<?php 

use App\App;

use App\Table\Category;

use App\Table\Post;

$post = Post::find($_GET['id']);

$category = Category::find($post->post_category_id);

?>

<div class="col-md-12">

  <h2><a href="<?= $post->url; ?>"><?= $post->title; ?></a></h2>

  <p><em><a href="index.php?p=category&id=<?= $post->category_id ?>" ><?= $post->category_name; ?></a></em></p>

  <?= $post->content; ?>

</div>
<?php App::setTitle($post->title); ?>