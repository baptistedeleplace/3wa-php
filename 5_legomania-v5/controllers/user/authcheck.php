<?php


/**
	============================================================
	Authentification
	============================================================
*/

$_SESSION['user_id'] = 0;

# verifie que les variables POST sont bien recues
if( !isset($_POST['email']) or !isset($_POST['email']) )
{
	header("location: user_auth.php?error=variables_not_set");
	exit;
}

# verifie que l'email est bien un email, pas une tentative de hacking
if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
{
	header("location: user_auth.php?error=bad_email_format");
	exit;
}


# requete sur la base de donnée
$sql = "
	SELECT *
	FROM `users`
	WHERE `email` LIKE '" . $_POST['email'] . "'
";
$link = get_db_link();
$q = mysqli_query($link, $sql);
$data = mysqli_fetch_array($q, MYSQLI_ASSOC);

# verifie qu'on à bien trouvé un user avec cet email
if( empty($data) )
{
	header("location: user_auth.php?error=bad_email");
	exit;
}

# verifie que le mot de passe envoyé (en POST) et celui stocké (en base de donnée) sont les mêmes
if( $_POST['password'] != $data['password'] )
{
	header("location: user_auth.php?error=bad_password");
	exit;
}

# on stock le user_id en session
$_SESSION['user_id'] = $data['user_id'];

# redirection HTTP à la fin du traitement
header("location: lego_index.php?authentification_success");
exit;