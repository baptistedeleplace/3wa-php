<?php


# création d'une connection au serveur MySQL
# voir http://www.w3schools.com/php/func_mysqli_connect.asp
function get_db_link ()
{

	return mysqli_connect(
		'localhost', 	# adresse du serveur
		'root',			# login
		'troiswa',		# password
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
			'name' => ucfirst($data['name']),
			'description' => ucfirst($data['description']),
		);
	}

	return $categories;
}


# Renvoi 'true' si l'internaute est authentifié, 'false' sinon
function is_admin ()
{
	if(isset($_SESSION['is_admin']) and $_SESSION['is_admin'] == true)
	{
		return true;
	}
	return false;
}