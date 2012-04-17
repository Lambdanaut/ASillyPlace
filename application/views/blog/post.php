<h1>Make a Silly Post</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('blog/post') ?>

	<div style="height: 350px;">
		<label>Title: </label>
		<input type="text" name="title" autofocus>

		<label>Your Name: </label>
		<input type="text" name="author" placeholder="Optional">

		<label>Text: </label>
		<textarea name="text"></textarea>

	</div>	
	<input type="submit" name="submit" value="Post your Post Posthaste" style="margin: auto; width: 220px;">

</form>