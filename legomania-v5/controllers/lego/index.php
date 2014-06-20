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


$link = get_db_link();


/**
	============================================================
	1. La liste de toutes les catégories
	============================================================
*/

$categories = get_all_categories();


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
$sql1 = "
	SELECT

		`legos`.`lego_id`,

		`legos`.`name`,

		(
			`legos`.`price` * ( `categorys`.`margin_rate` + 1 )
			+ `categorys`.`expedition_price`
		) AS total_price

	FROM  `legos`

	LEFT JOIN `categorys`
		ON `categorys`.`category_id` = `legos`.`category_id`

";

# si $cid est OK, on complète cette chaîne
if($cid){
	$sql1 .= "
		WHERE `categorys`.`category_id` = " . $cid . "
	";
}

# si $from est OK, on complète cette chaîne
$sql1 .= "
	LIMIT " . $from . " , 3
";

# envoi de cette requête à MySQL
$q1 = mysqli_query($link, $sql1);

# on stocke dans un tableau provisoire les données
while ($data = mysqli_fetch_array($q1, MYSQLI_ASSOC))
{
	$legos[] = array(
		'lego_id' => $data['lego_id'],
		'name' => ucfirst(utf8_encode($data['name'])),
		'total_price' => round($data['total_price'], 2),
	);
}


/**
	============================================================
	4. Génération de la pagination
	============================================================
*/
$paginations = array();

# construction de la chaine (string), qui servira de requête SQL
$sql2 = "
	SELECT
		COUNT(*) AS n
	FROM `legos`
";
# si $cid est OK, on complète cette chaîne
if($cid){
	$sql2 .= "
		WHERE `category_id` = " . $cid . "
	";
}

# envoi de cette requête à MySQL
$q2 = mysqli_query($link, $sql2);

# on stocke dans un tableau provisoire les données
$data = mysqli_fetch_array($q2, MYSQLI_ASSOC);

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

