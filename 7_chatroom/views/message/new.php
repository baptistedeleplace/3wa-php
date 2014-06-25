
<?php include VIEWS_DIR . '_common/header.html' ?>


<div class="container">

	<div class="row">
		<div class="col-md-12">

			<h2>Saisissez votre message ...</h2>

			<form action="message_create.php" method="post">

				<input class="form-control" type="text" name="content">

				<br>

				<input class="btn btn-primary btn-lg pull-right" type="submit" value="Envoyer ...">

			</form>

			<hr>

			<button id="btn">Rafraichir</button>

			<hr>

			<div id="messages"></div>

		</div>
	</div>

</div>


<script type="text/javascript">

	jQuery(document).ready(function($) {

		$('#btn').click(function() {

			$.ajax({
				url: 'message_index.php',
				success:function (html) {

					$('#messages').html(html);

				}
			});

		});

	});

</script>


<?php include VIEWS_DIR . '_common/footer.html'; ?>
