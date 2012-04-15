<h1>Make a Silly Post</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('blog/post') ?>

	<label for="title">Title: </label>
	<input type="input" name="title">

	<label for="author">Your Name(Optional): </label>
	<input type="input" name="author">

	<label for="text">Text: </label>
	<textarea name="text"></textarea>
	
	<input type="submit" name="submit" value="Post your Post Posthaste"> 

</form>

