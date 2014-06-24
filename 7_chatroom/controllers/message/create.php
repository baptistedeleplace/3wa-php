<?php

# s'il n'est pas authentifié il est éjecté de la page
if(!isset($_SESSION['nickname'])){
	header("location: user_auth.php");
}

/**
	============================================================
	Enregistrement d'un nouveau message
	============================================================
*/

$link = get_db_link();

# on nettoie les variables d'input
$nickname = mysqli_real_escape_string($link, $_SESSION['nickname']);
$content = mysqli_real_escape_string($link, $_POST['content']);

# on créé notre requête SQL ...
$sql = "

	INSERT INTO  `messages`
	(
		`created_at`,
		`nickname`,
		`content`
	)

	VALUES
	(
		'" . date("Y-m-d H:i:s") . "',
		'" . $nickname . "',
		'" . $content . "'
	)

";

# envoi de cette requête à MySQL
mysqli_query($link, $sql);

# redirection HTTP à la fin du traitement
header("location: message_index.php");
