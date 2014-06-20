
<hr>

<?php foreach ($comments as $c): ?>

<div class="panel panel-default">

	<div class="panel-heading">
		<h3 class="panel-title"><b><?=$c['name']?></b>, le <?=$c['time_day']?> à <?=$c['time_hour']?></h3>
	</div>

	<div class="panel-body">
		<?=$c['content_html']?>
	</div>

</div>

<?php endforeach ?>