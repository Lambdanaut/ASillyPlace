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
