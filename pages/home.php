<?php foreach (App\Table\Post::getLast() as $post): ?>

    <div class="col-md-4">

      <h2><a href="<?= $post->url; ?>"><?= $post->title; ?></a></h2>

      <p><em><a href="index.php?p=category&id=<?= $post->category_id ?>" ><?= $post->category_name; ?></a></em></p>

      <?= $post->extract; ?>

    </div>

<?php endforeach; ?>
		