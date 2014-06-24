
<?php include VIEWS_DIR . '_common/header.html' ?>


<div class="container">

	<div class="row">
		<div class="col-md-12">

			<h2>Saisissez votre message ...</h2>

			<form action="message_create.php" method="post">

				<input class="form-control" type="text" name="content">

				<br>

				<input class="btn btn-primary btn-lg pull-right" type="submit" value="Envoyer ...">

			</form>

			<hr>

			<?php foreach ($messages as $m): ?>

			<h3><?=$m['nickname']?>, <?=$m['time_day']?> à <?=$m['time_hour']?></h3>
			<p><?=$m['content_html']?></p>

			<?php endforeach ?>

		</div>
	</div>

</div>


<?php include VIEWS_DIR . '_common/footer.html'; ?>
