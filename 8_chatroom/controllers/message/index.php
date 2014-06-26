<?php

/**
	============================================================
	Les 20 derniers messages
	============================================================
*/

$messages = array();

# on créé le premier morceau de la chaine (string)
# de notre future requête SQL ...
$sql = "
	SELECT *
	FROM  `messages`
	ORDER BY `message_id` DESC
";

$link = get_db_link();

# envoi de cette requête à MySQL
$q = mysqli_query($link, $sql);

# on stocke dans un tableau provisoire les données
while ($data = mysqli_fetch_array($q, MYSQLI_ASSOC))
{
	$messages[] = array(
		'message_id' => $data['message_id'],
		'time_day' => date('m/d', strtotime($data['created_at'])),
		'time_hour' => date('G:i', strtotime($data['created_at'])),
		'content' => utf8_encode($data['content']),
		'content_html' => nl2br(utf8_encode($data['content'])),
		'nickname' => ucfirst(utf8_encode($data['nickname'])),
	);
}