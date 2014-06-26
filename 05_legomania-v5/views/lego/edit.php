
<?php include VIEWS_DIR . '_common/header.php'; ?>



<div class="jumbotron">
	<div class="container">


		<a href="lego_show.php?lid=<?php echo $lego['lego_id']; ?>" class="btn btn-success">
			<span class="glyphicon glyphicon-chevron-left"></span>
			Retour à la fiche
		</a>

		<h1>
			Edition de la fiche #<?php echo $lego['lego_id']; ?>
		</h1>

<?php /**
	============================================================
	Affichage des info du lego dans un formulaire
	============================================================
*/ ?>
		<form action="lego_update.php" method="post">

			<input type="hidden" name="lego_id" value="<?php echo $lego['lego_id']; ?>">

			<div class="form-group">
				<label>Nom du Lego</label>
				<input type="text" class="form-control" name="name" value="<?php echo $lego['name']; ?>">
			</div>

			<div class="form-group">
				<label>Prix avant marge, en euros</label>
				<input type="text" class="form-control" name="price" value="<?php echo $lego['price']; ?>">
			</div>

			<div class="form-group">
				<label>Catégorie</label>
				<select name="category_id" class="form-control">

<?php foreach ($categories as $c): ?>

	<option <?php echo $c['selected']; ?> value="<?php echo $c['category_id']; ?>">
		<?php echo $c['name']; ?>
	</option>

<?php endforeach ?>

				</select>
			</div>

			<input type="submit" class="form-control btn-primary" value="Enregistrer">

		</form>


	</div>
</div>



<?php include VIEWS_DIR . '_common/footer.php'; ?>
