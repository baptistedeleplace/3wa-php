<?php if (is_connected()): ?>

<hr>

<form action="comment_create.php" method="post" id="comment-new">

	<input type="hidden" name="lego_id" value="<?=$lid?>">

	<textarea name="content" class="form-control" placeholder="Votre commentaire ..."></textarea>

	<br>

	<input type="submit" class="form-control btn btn-success" value="Commenter">

</form>

<?php endif ?>
