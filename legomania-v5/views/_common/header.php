<!DOCTYPE html>
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
				<a class="navbar-brand" href="index.php">LegoMania</a>
			</div>
			<div class="navbar-collapse collapse">

<?php if (is_connected()): ?>

				<p style="text-align: right; color: white;">
					Bonjour
					<?php echo get_connected_user()['name']; ?>
				</p>

<?php else: ?>

				<form method="post" action="user_authcheck.php" class="navbar-form navbar-right" role="form">
					<div class="form-group">
						<input type="text" name="email" placeholder="Email" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="Password" class="form-control">
					</div>
					<button type="submit" class="btn btn-success">Connexion</button>
				</form>

<?php endif; ?>

			</div>
		</div>
	</div>