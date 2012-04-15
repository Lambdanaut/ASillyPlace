<?php if (count ($blog) == 0): ?>
	<div style="text-align:center;">
		<p>It looks like there aren't any posts yet. Why don't you...</p>
		<h2><a href="/blog/post"> Make One </a></h2>
	</div>
<?php endif; ?>
<?php foreach ($blog as $blog_item): ?>
	<div class="post">
		<h1><a href="/<?php echo $blog_item['slug'] ?>"><?php echo $blog_item['title'] ?></a></h1>
		<div class="meta">
			<strong>Posted: </strong><i><?php echo $blog_item['date'] ?></i><br />
			<strong>By: </strong><i><?php echo $blog_item['author']; ?></i>
		</div>
		<div class="text">
			<?php echo $blog_item['text'] ?>
		</div>
	</div>

<?php endforeach ?>
