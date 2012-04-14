<?php foreach ($blog as $blog_item): ?>

	<h2><?php echo $blog_item['title'] ?></h2>
	<div id="main">
		<?php echo $blog_item['text'] ?>
	</div>
	<p><a href="blog/<?php echo $blog_item['slug'] ?>">View Article</a></p>
<?php endforeach ?>
