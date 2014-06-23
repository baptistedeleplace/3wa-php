
<?php include VIEWS_DIR . '_common/header.php'; ?>


<?php /**
	============================================================
	2. Affichage du titre
	============================================================
*/ ?>

<div class="jumbotron">
	<div class="container">

		<h1><?php echo $category_title; ?></h1>
		<p>Le site de tout les légos, même pas chers.</p>

	</div>
</div>



<div class="container">

<?php /**
	============================================================
	1. Affichage des catégories
	============================================================
*/ ?>

	<ul class="nav nav-tabs">

		<li <?php if($cid == 0) echo 'class="active"'; ?> >
			<a href="?">Toutes les catégories</a>
		</li>

<?php foreach ($categories as $c): ?>

		<li <?php if($c['category_id'] == $cid) echo 'class="active"'; ?> >
			<a href="?cid=<?php echo $c['category_id']; ?>">
				<?php echo $c['name']; ?>
			</a>
		</li>

<?php endforeach; ?>

	</ul>


	<div class="row">

<?php /**
	============================================================
	3. Affichage des légos
	============================================================
*/ ?>

<?php if (empty($legos)): ?>

	<p><i>Oups! Il n'y a pas de légo dans cette catégorie :(</i></p>

<?php else: ?>

	<?php foreach ($legos as $l): ?>

		<div class="col-md-4">

			<h3><?php echo $l['name']; ?></h3>

			<p><?php echo $l['total_price']; ?> €</p>

			<div style="background: url(img/legos/<?php echo $l['lego_id']; ?>.png) center center; height: 50px; width: 100%; margin: 5px;"></div>

			<a href="lego_show.php?lid=<?php echo $l['lego_id']; ?>" class="btn btn-success btn-sm">
				Voir nos dernères offres
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>

		</div>

	<?php endforeach; ?>

<?php endif; ?>



	</div>


	<hr>

<?php /**
	============================================================
	4. Affichage de la pagination
	============================================================
*/ ?>

	<ul class="pagination">

		<?php foreach ($paginations as $p): ?>

			<li>
				<a href="<?php echo $p['uri']; ?>">
					<?php echo $p['page_number']; ?>
				</a>
			</li>

		<?php endforeach ?>

	</ul>

</div> <!-- /container -->


<?php include VIEWS_DIR . '_common/footer.php'; ?>
