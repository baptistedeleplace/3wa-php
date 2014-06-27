<?php

# s'il n'est pas authentifié il est éjecté de la page
if(!User::is_login())
{
	header("location: user_auth.php");
}

/**
	============================================================
	Enregistrement d'un nouveau message
	============================================================
*/

(new Message)->add($_POST['content']);

# redirection HTTP à la fin du traitement
header("location: message_new.php");
