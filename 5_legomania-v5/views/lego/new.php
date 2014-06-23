
<?php include VIEWS_DIR . '_common/header.php'; ?>



<div class="jumbotron">
	<div class="container">


		<a href="lego_index.php" class="btn btn-success">
			<span class="glyphicon glyphicon-chevron-left"></span>
			Retour à l'acceuil
		</a>

		<h1>
			Ajout d'un produit
		</h1>


<?php /**
	============================================================
	Affichage du formulaire de création d'un produit
	============================================================
*/ ?>
		<form action="lego_create.php" method="post">

			<div class="form-group">
				<label>Nom du Lego</label>
				<input type="text" class="form-control" name="name">
			</div>

			<div class="form-group">
				<label>Prix avant marge, en euros</label>
				<input type="text" class="form-control" name="price">
			</div>

			<div class="form-group">
				<label>Catégorie</label>
				<select name="category_id" class="form-control">

<?php foreach ($categories as $c): ?>

	<option value="<?php echo $c['category_id']; ?>">
		<?php echo $c['name']; ?>
	</option>

<?php endforeach ?>

				</select>
			</div>

			<input type="submit" class="form-control btn-primary" value="Ajouter">

		</form>



	</div>
</div>



<?php include VIEWS_DIR . '_common/footer.php'; ?>
