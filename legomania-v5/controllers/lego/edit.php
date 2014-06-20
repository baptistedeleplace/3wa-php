<?php


# s'il n'est pas authentifié il est éjecté de la page
if(!is_connected()){
	header("location: user_auth.php");
}

# on nettoie la variable d'input
$lid = 0;
if( isset($_GET['lid']) and
	is_numeric($_GET['lid'])
){
	$lid = intval($_GET['lid']);
}

# si $lid est vide, je redirige l'utilisateur par sécurité
if(!$lid){
	header("location: lego_index.php");
}



/**
	============================================================
	Les infos du lego
	============================================================
*/

# on créé notre future requête SQL ...
$sql = "
	SELECT 	`legos`.*
	FROM  	`legos`
	WHERE 	`lego_id` = " . $lid . "
";

# connection à la base de donnée MySQL
$link = get_db_link();

# envoi de cette requête à MySQL
$q = mysqli_query($link, $sql);

# on stocke dans un tableau provisoire les données
$lego = mysqli_fetch_array($q, MYSQLI_ASSOC);


/**
	============================================================
	La liste de toutes les catégories
	============================================================
*/

$categories = get_all_categories();

foreach ($categories as $c)
{
	# par défaut aucune catégorie n'est "selected" ...
	$categories[$c['category_id']]['selected'] = '';

	# ... sauf si c'est la catégorie du lego ...
	if($c['category_id'] == $lego['category_id'])
	{

		# ... alors on va écraser la valeur.
		$categories[$c['category_id']]['selected'] = 'selected';

	}

}
