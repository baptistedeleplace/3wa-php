<?php

/**
	============================================================
	Les commentaires du lego
	============================================================
*/

$comments = array();

# on créé le premier morceau de la chaine (string)
# de notre future requête SQL ...
$sql2 = "
	SELECT

		`comments`.`comment_id`,
		`comments`.`created_at`,
		`comments`.`content`,
		`users`.`name`

	FROM  `comments`

	LEFT JOIN `users`
		ON `users`.`user_id` = `comments`.`user_id`

	WHERE
		`comments`.`lego_id` = " . $lid . "

	ORDER BY
		`comments`.`created_at` DESC

";

# envoi de cette requête à MySQL
$q2 = mysqli_query($link, $sql2);

# on stocke dans un tableau provisoire les données
while ($data = mysqli_fetch_array($q2, MYSQLI_ASSOC))
{
	$comments[] = array(
		'comment_id' => $data['comment_id'],
		'time_day' => date('m/d', strtotime($data['created_at'])),
		'time_hour' => date('G:i', strtotime($data['created_at'])),
		'content' => utf8_encode($data['content']),
		'content_html' => nl2br(utf8_encode($data['content'])),
		'name' => ucfirst(utf8_encode($data['name'])),
	);
}