<?php

if(!isset($_POST['nickname']) or empty($_POST['nickname']))
	header("Location: user_auth.php");

$_SESSION['nickname'] = $_POST['nickname'];

header("Location: message_index.php");
