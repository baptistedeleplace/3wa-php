<?php

# on nettoie les variables d'input
$cid = 0;
if( isset($_GET['cid']) and
	is_numeric($_GET['cid'])
){
	$cid = intval($_GET['cid']);
}

$from = 0;
if( isset($_GET['from']) and
	is_numeric($_GET['from'])
){
	$from = intval($_GET['from']);
}


# création d'une connection au serveur MySQL
# voir http://www.w3schools.com/php/func_mysqli_connect.asp
$link = mysqli_connect(
	'localhost', 	# adresse du serveur
	'root',			# login
	'troiswa',		# password
	'legomania'		# nom de la base de donnée
);

/**
	============================================================
	1. La liste de toutes les catégories
	============================================================
*/
$categories = array();

# construction de la chaine (string), qui servira de requête SQL
$sql1 = "
	SELECT *
	FROM `categorys`
";

# envoi de cette requête à MySQL
# voir http://www.w3schools.com/php/func_mysqli_query.asp
$q1 = mysqli_query($link, $sql1);

# on stocke dans un tableau provisoire les données
# http://www.w3schools.com/php/func_mysqli_fetch_array.asp
while ($data = mysqli_fetch_array($q1, MYSQLI_ASSOC))
{
	$categories[$data['category_id']] = array(
		'category_id' => $data['category_id'],
		'name' => ucfirst($data['name']),
		'description' => ucfirst($data['description']),
	);
}

/**
	============================================================
	2. Le titre de la catégorie en cours
	============================================================
*/

# on met un titre par défaut ...
$category_title = 'Bienvenue chez LegoMania !';

# ... et on l'écrase si la catégorie en cours existe
if(isset($categories[$cid]))
{
	$category_title = 'Les legos ' . $categories[$cid]['name'] . ' !';
}

/**
	============================================================
	3. Les produits de la catégorie en cours
	============================================================
*/
$legos = array();

# on créé le premier morceau de la chaine (string)
# de notre future requête SQL ...
$sql2 = "
	SELECT
		`legos`.`name`,
		(
			( `legos`.`price` * `categorys`.`margin_rate` )
			+ `categorys`.`expedition_price`
		) AS total_price
	FROM  `legos`
	LEFT JOIN `categorys`
		ON `categorys`.`category_id` = `legos`.`category_id`
";

# si $cid est OK, on complète cette chaîne
if($cid){
	$sql2 .= "
		WHERE `categorys`.`category_id` = " . $cid . "
	";
}

# si $from est OK, on complète cette chaîne
$sql2 .= "
	LIMIT " . $from . " , 3
";

# envoi de cette requête à MySQL
$q2 = mysqli_query($link, $sql2);

# on stocke dans un tableau provisoire les données
while ($data = mysqli_fetch_array($q2, MYSQLI_ASSOC))
{
	$legos[] = array(
		'name' => ucfirst($data['name']),
		'price' => round($data['total_price'], 2),
	);
}


/**
	============================================================
	4. Génération de la pagination
	============================================================
*/
$paginations = array();

# construction de la chaine (string), qui servira de requête SQL
$sql3 = "
	SELECT
		COUNT(*) AS n
	FROM `legos`
";
# si $cid est OK, on complète cette chaîne
if($cid){
	$sql3 .= "
		WHERE `category_id` = " . $cid . "
	";
}

# envoi de cette requête à MySQL
$q3 = mysqli_query($link, $sql3);

# on stocke dans un tableau provisoire les données
$data = mysqli_fetch_array($q3, MYSQLI_ASSOC);

# calcul du nombre de pages
$n_legos = $data['n'];
$n_pages = ceil( $n_legos / 3 );

# on stocke dans un tableau provisoire les données utiles à la pagination
for ($i=1; $i <= $n_pages; $i++)
{
	$f = ($i - 1) * 3;
	$paginations[] = array(
		'page_number' => $i,
		'uri' => "?cid=" . $cid . "&from=" . $f,
	);
}
# ... s'il n'y a qu'une page, on "vide" (en l'écrasant) le tableau
if ($n_pages <= 1){
	$paginations = array();
}

