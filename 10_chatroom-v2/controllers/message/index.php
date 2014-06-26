<?php

# s'il n'est pas authentifié il est éjecté de la page
if(!User::is_login())
{
	header("location: user_auth.php");
}

/**
	============================================================
	Les 20 derniers messages
	============================================================
*/

$messages = (new Message)->get_all(30);