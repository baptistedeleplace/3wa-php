<?php

$url = 'http://5inq.fr/3wa/chatroom/api/getMessages.php';

$json = file_get_contents($url);

$array = json_decode($json, true);

?>

<pre>

	<?php print_r($array); ?>

</pre>

