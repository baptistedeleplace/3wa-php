<?php foreach ($messages as $m): ?>

	<h3><?=$m['nickname']?>, <?=$m['time_day']?> à <?=$m['time_hour']?></h3>

	<p><?=$m['content_html']?></p>

<?php endforeach ?>
