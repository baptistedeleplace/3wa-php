<?php

# s'il n'est pas authentifié il est éjecté de la page
if(!is_connected()){
	header("location: user_auth.php");
}

/**
	============================================================
	Enregistrement d'un nouveau commentaire
	============================================================
*/

$link = get_db_link();

# on nettoie les variables d'input
$lego_id = intval($_POST['lego_id']);
$user_id = intval($_SESSION['user_id']);
$content = mysqli_real_escape_string($link, $_POST['content']);

# on créé notre requête SQL ...
$sql = "

	INSERT INTO  `comments`
	(
		`lego_id`,
		`created_at`,
		`user_id`,
		`content`
	)

	VALUES
	(
		" . $lego_id . ",
		'" . date("Y-m-d H:i:s") . "',
		" . $user_id . ",
		'" . $content . "'
	)

";

# envoi de cette requête à MySQL
mysqli_query($link, $sql);

# redirection HTTP à la fin du traitement
header("location: lego_show.php?lid=" . $lego_id . "#comment-new");
