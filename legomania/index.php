<?php

	// j'isole mon code php
	include 'php/controller.php';

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
		<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
				<title></title>
				<meta name="description" content="">
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<link rel="stylesheet" href="css/bootstrap.min.css">
				<style>
						body {
								padding-top: 50px;
								padding-bottom: 20px;
						}
				</style>
				<link rel="stylesheet" href="css/bootstrap-theme.min.css">
				<link rel="stylesheet" href="css/main.css">

				<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		</head>
		<body>

		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">LegoMania</a>
				</div>
			</div>
		</div>

		<div class="jumbotron">
			<div class="container">

<?php /**
	============================================================
	Affichage du titre
	============================================================
*/ ?>

<h1><?php echo $category_title; ?></h1>

				<p>Le site de tout les légos, même pas chers.</p>

			</div>
		</div>

		<div class="container">

			<ul class="nav nav-tabs">
<?php /**
	============================================================
	Affichage des catégories
	============================================================
*/ ?>

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
	Affichage des légos
	============================================================
*/ ?>

<?php if (empty($legos)): ?>

	<p><i>Oups! Il n'y a pas de légo dans cette catégorie :(</i></p>

<?php else: ?>

	<?php foreach ($legos as $l): ?>

		<div class="col-md-3">
			<h3><?php echo $l['name']; ?></h3>
		</div>

	<?php endforeach; ?>

<?php endif; ?>



			</div>


			<hr>

<?php /**
	============================================================
	Affichage de la pagination
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





			<hr>

			<footer>
				<p>&copy; 3WA 2014</p>
			</footer>
		</div> <!-- /container -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

		<script src="js/vendor/bootstrap.min.js"></script>

		<script src="js/main.js"></script>

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='//www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X');ga('send','pageview');
		</script>

	</body>
</html>
