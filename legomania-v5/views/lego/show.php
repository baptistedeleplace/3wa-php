
<?php include VIEWS_DIR . '_common/header.php'; ?>



<div class="jumbotron">
	<div class="container">

<?php /**
	============================================================
	Affichage des info du lego
	============================================================
*/ ?>

		<div style="background: url(img/legos/<?php echo $lego['lego_id']; ?>.png) center center; height: 400px; width: 40%; margin: 5px; float: right;"></div>

		<a href="lego_index.php?cid=<?php echo $lego['category_id']; ?>" class="btn btn-success">
			<span class="glyphicon glyphicon-chevron-left"></span>
			Retour à la catégorie <?php echo $lego['category']; ?>
		</a>

		<h1>
			<?php echo $lego['name']; ?> <br>
			<small>ref #<?php echo $lego['lego_id']; ?></small>
		</h1>
		<p>
			<?php echo $lego['total_price']; ?> € <br>
			<i>frais de port inclus!</i>
		</p>

<?php if (is_connected()): ?>
		<a href="lego_edit.php?lid=<?php echo $lego['lego_id']; ?>" class="btn btn-primary">
			<span class="glyphicon glyphicon-edit"></span>
			Editer
		</a>
<?php endif; ?>

	</div>
</div>

<div class="container">

	<?php include VIEWS_DIR . 'comment/new.php'; ?>

	<?php include VIEWS_DIR . 'comment/index.php'; ?>

</div>

<?php include VIEWS_DIR . '_common/footer.php'; ?>
