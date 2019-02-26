<?php 

use App\App;

use App\Table\Category;

use App\Table\Post;

$category = Category::find($_GET['id']);

if($category === false)
	App::notFound();
?>

<div class="row">
	<div class="col-sm-8">
		<ul>
			<?php foreach (Post::lastByCategory($category->category_id) as $post): ?>

			  <h2><a href="<?= $post->url; ?>"><?= $post->title; ?></a></h2>
			  <p><em><?= $post->category_name; ?></em></p>
			  <p><?= $post->extract; ?></p>

			<?php endforeach; ?>

		</ul>
	</div>
	<div class="col-sm-4">
		<ul>
		<?php 
		    App::setTitle($post->category_name);
		    foreach (Category::all() as $category):
		?>
            <li><a href="<?= $category->url; ?>"><?= $category->name; ?></a></li>
		<?php endforeach; ?>
		</ul>
	</div>
</div>