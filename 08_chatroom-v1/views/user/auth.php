
<?php include VIEWS_DIR . '_common/header.html' ?>



<div class="jumbotron">
	<div class="container">
		<h1>Chat Room</h1>
		<p>Ceci est un exemple de chat.</p>
	</div>
</div>

<div class="container">

	<div class="row">
		<div class="col-md-12">

			<h2>Merci de saisir votre pseudo</h2>

			<form action="user_authcheck.php" method="post">

				<input class="form-control" type="text" name="nickname">

				<br>

				<input class="btn btn-primary btn-lg pull-right" type="submit" value="Entrer ...">

			</form>

		</div>
	</div>

</div>





<?php include VIEWS_DIR . '_common/footer.html'; ?>
