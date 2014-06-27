
<?php include VIEWS_DIR . '_common/header.html' ?>


<div class="container">

	<div class="row">
		<div class="col-md-12">

			<h2>
				Bonjour <b><?=$nickname?></b>,
				Saisissez votre message ...
			</h2>

			<form action="message_create.php" method="post">

				<input class="form-control" type="text" name="content">

				<br>

				<input class="btn btn-primary btn-lg pull-right" type="submit" value="Envoyer ...">

			</form>

			<hr>

			<div class="row">

				<div class="col-md-4">
					<h2>
						Utilisateurs connectés <br>
						<small>(actifs ces 30 dernières minutes)</small>
					</h2>
					<div id="users"></div>
				</div>

				<div class="col-md-8">
					<div id="messages"></div>
				</div>

			</div>

		</div>
	</div>

</div>


<script type="text/javascript">

	function refresh_messages ()
	{
		$.ajax({
			url: 'message_index.php',
			success:function (html) {
				$('#messages').html(html);
			}
		});
	}

	function refresh_users ()
	{
		$.ajax({
			url: 'user_connected.php',
			success:function (html) {
				$('#users').html(html);
			}
		});
	}

	refresh_messages();

	jQuery(document).ready(function($) {

		setInterval(function(){

			refresh_messages();
			refresh_users();

		}, 1000);

	});

</script>


<?php include VIEWS_DIR . '_common/footer.html'; ?>
