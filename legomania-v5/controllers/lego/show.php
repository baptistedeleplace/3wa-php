<?php


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


$link = get_db_link();

/**
	============================================================
	Les infos du lego
	============================================================
*/

# on créé notre future requête SQL ...
$sql1 = "
	SELECT

		`legos`.`lego_id`,

		`legos`.`category_id`,

		`legos`.`name`,

		`categorys`.`name` AS category_name,

		(
			`legos`.`price` * ( `categorys`.`margin_rate` + 1 )
			+ `categorys`.`expedition_price`
		) AS total_price

	FROM  `legos`

	LEFT JOIN `categorys`
		ON `categorys`.`category_id` = `legos`.`category_id`

	WHERE `lego_id` = " . $lid . "
";

# envoi de cette requête à MySQL
$q1 = mysqli_query($link, $sql1);

# on stocke dans un tableau provisoire les données
$data = mysqli_fetch_array($q1, MYSQLI_ASSOC);

$lego = array(
	'lego_id' 		=> $data['lego_id'],
	'name' 			=> ucfirst(utf8_encode($data['name'])),
	'total_price' 	=> round($data['total_price'], 2),
	'category_id' 	=> $data['category_id'],
	'category' 		=> ucfirst($data['category_name']),
);

include CTRLRS_DIR . 'comment/index.php';
