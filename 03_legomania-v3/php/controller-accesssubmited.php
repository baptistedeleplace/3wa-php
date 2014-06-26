<?php

session_start();

/**
	============================================================
	Authentification
	============================================================
*/

$_SESSION['is_admin'] = false;

if(	isset($_POST['password']) and $_POST['password'] == 'troiswa' )
{
	$_SESSION['is_admin'] = true;
}

# redirection HTTP à la fin du traitement
header("location: access.php");