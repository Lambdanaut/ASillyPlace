<div class="post">
	<h1><a href="/<?php echo $blog_item['slug'] ?>"><?php echo $blog_item['title'] ?></a></h1>
	<div class="meta">
		<strong>Posted: </strong><i><?php echo $blog_item['date'] ?></i><br>
		<strong>By: </strong><i><?php echo $blog_item['author']; ?></i>
	</div>
	<div class="text">
		<?php echo $blog_item['text'] ?>
	</div>
</div>

<?php foreach ($comments as $comment): ?>
	<div class="reply">
		<div class="meta">
			<strong><?php echo $comment['author']; ?></strong> said: 
		</div>
		<div class="text">
			<blockquote><?php echo $comment['text'] ?></blockquote>
		</div>
	</div>

<?php endforeach ?>


<?php echo form_open('blog/view/'.$blog_item['slug']) ?>
	<?php echo validation_errors(); ?>
	<div style="height: 315px;">
		<div style="text-align:center; margin-top: 50px;"><strong>Reply To Post</strong></div>
		<label>Your Name: </label>
		<input type="text" name="author" placeholder="Optional" autofocus>

		<label>Text: </label>
		<textarea name="text"></textarea>

	</div>	
	<input type="submit" name="submit" value="Reply" style="margin: auto; width: 100px;">

</form>

