<?php


# s'il n'est pas authentifié il est éjecté de la page
if(!is_connected()){
	header("location: user_auth.php");
}

/**
	============================================================
	Enregistrement d'un nouveau produit
	============================================================
*/

$link = get_db_link();

# on nettoie les variables d'input
$cid = intval($_POST['category_id']);
$price = intval($_POST['price']);
$name = mysqli_real_escape_string($link, $_POST['name']);

# on créé notre requête SQL ...
$sql = "

	INSERT INTO  `legos`
	(
		`category_id`,
		`name`,
		`price`
	)

	VALUES
	(
		" . $cid . ",
		'" . $name . "',
		" . $price . "
	)

";

# envoi de cette requête à MySQL
mysqli_query($link, $sql);

# redirection HTTP à la fin du traitement
header("location: lego_index.php");
