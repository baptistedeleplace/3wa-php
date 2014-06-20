



		<div class="container">

			<hr>

			<footer>

<?php if (is_connected()): ?>

				<a href="lego_new.php" class="btn btn-primary" style="float: right;">Ajouter un Lego</a>

				<a href="user_authcheck.php"  class="btn btn-danger" style="float: right;">
					<span class="glyphicon glyphicon-log-out"></span>
					LogOut
				</a>

<?php else: ?>

				<p style="float: right;"><i>Vous n'êtes <u>pas</u> authentifié.</i>
					<a href="user_auth.php">M'authentifier.</a>
				</p>

<?php endif; ?>

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
