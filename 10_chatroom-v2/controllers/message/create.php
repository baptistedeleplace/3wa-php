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


$m = new Message;

$m->add($_SESSION['nickname'], $_POST['content']);

# redirection HTTP à la fin du traitement
header("location: message_new.php");
