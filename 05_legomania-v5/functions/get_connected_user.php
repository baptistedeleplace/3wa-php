<?php

# Obtenir l'utilisateur connecté (ou pas)
function get_connected_user ()
{

	$not_connected_user = array(
		'user_id' => 0,
		'email' => '',
		'name' => 'Offline',
	);

	if(!isset($_SESSION['user_id']))
	{
		return $not_connected_user;
	}

	if($_SESSION['user_id'] == 0)
	{
		return $not_connected_user;
	}

	$sql = "
		SELECT *
		FROM `users`
		WHERE `user_id` = " . intval($_SESSION['user_id']) . "
	";

	$link = get_db_link();

	# envoi de cette requête à MySQL
	$q = mysqli_query($link, $sql);

	# on stocke dans un tableau provisoire les données
	$data = mysqli_fetch_array($q, MYSQLI_ASSOC);

	if(empty($data))
	{
		return $not_connected_user;
	}

	return array(
		'user_id' => $data['user_id'],
		'email' => $data['email'],
		'name' => $data['name'],
	);

}