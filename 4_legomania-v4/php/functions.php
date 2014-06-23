<?php


# création d'une connection au serveur MySQL
# voir http://www.w3schools.com/php/func_mysqli_connect.asp
function get_db_link ()
{

	return mysqli_connect(
		'localhost', 	# adresse du serveur
		'root',			# login
		'',
//		'troiswa',		# password
		'legomania'		# nom de la base de donnée
	);

}


# Renvoi un tableau de toutes les catégories
function get_all_categories ()
{
	$categories = array();

	# construction de la chaine (string), qui servira de requête SQL
	$sql1 = "
		SELECT *
		FROM `categorys`
	";

	$link = get_db_link();

	# envoi de cette requête à MySQL
	# voir http://www.w3schools.com/php/func_mysqli_query.asp
	$q = mysqli_query($link, $sql1);

	# on stocke dans un tableau provisoire les données
	# http://www.w3schools.com/php/func_mysqli_fetch_array.asp
	while ($data = mysqli_fetch_array($q, MYSQLI_ASSOC))
	{
		$categories[$data['category_id']] = array(
			'category_id' => $data['category_id'],
			'name' => ucfirst(utf8_encode($data['name'])),
			'description' => ucfirst($data['description']),
		);
	}

	return $categories;
}


# Renvoi 'true' si l'internaute est authentifié, 'false' sinon
function is_connected ()
{
	if(isset($_SESSION['user_id']) and $_SESSION['user_id'] == true)
	{
		return true;
	}
	return false;
}

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