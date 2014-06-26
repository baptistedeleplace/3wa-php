<?php

if(!isset($_POST['nickname']) or empty($_POST['nickname']))
	header("Location: user_auth.php");

$u = new User($_POST['nickname']);
$u->login();

header("Location: message_new.php");
