
<?php include VIEWS_DIR . '_common/header.php' ?>



<div class="jumbotron">
	<div class="container">

		<a href="lego_index.php" class="btn btn-success">
			<span class="glyphicon glyphicon-chevron-left"></span>
			Retour à l'accueil
		</a>

		<h1>
			<span class="glyphicon glyphicon-lock"></span>
			Veuillez vous authentifier ...
		</h1>

<?php if (isset($_GET['error'])): ?>

		<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Oups !</strong> <?php echo $_GET['error']; ?>
		</div>

<?php endif ?>

<?php /**
	============================================================
	Affichage du formulaire du mot de passe
	============================================================
*/ ?>
		<form action="user_authcheck.php" method="post">

			<div class="form-group">
				<label>Email</label>
				<input type="text" class="form-control" name="email">
			</div>

			<div class="form-group">
				<label>Mot de passe</label>
				<input type="password" class="form-control" name="password">
			</div>

			<input type="submit" class="form-control btn-primary" value="Login">

		</form>

	</div>
</div>



<?php include VIEWS_DIR . '_common/footer.php'; ?>
