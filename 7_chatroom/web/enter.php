<?php

session_start();

if(!isset($_POST['nickname']) or empty($_POST['nickname']))
	header("Location: index.html");

$_SESSION['nickname'] = $_POST['nickname'];

header("Location: chatroom.html");