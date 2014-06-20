<?php


# s'il n'est pas authentifié il est éjecté de la page
if(!is_connected()){
	header("location: user_auth.php");
}

/**
	============================================================
	Enregistrement des données reçues
	============================================================
*/

$link = get_db_link();

# on nettoie les variables d'input
$lid = intval($_POST['lego_id']);
$cid = intval($_POST['category_id']);
$price = intval($_POST['price']);
$name = mysqli_real_escape_string($link, $_POST['name']);

# on créé notre requête SQL ...
$sql = "

	UPDATE  `legos`

	SET
		`category_id` 	=  " . $cid . ",
		`name` 			=  '" . $name . "',
		`price` 		=  " . $price . "

	WHERE  `lego_id` = " . $lid . "

";

# envoi de cette requête à MySQL
mysqli_query($link, $sql);


# redirection HTTP à la fin du traitement
header("location: edit.php?lid=" . $lid);