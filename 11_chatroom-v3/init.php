<?php

# on démarre la gestion des sessions
session_start();

# on definie quelques constantes
define('VIEWS_DIR', __DIR__ . '/views/');
define('CTRLRS_DIR', __DIR__ . '/controllers/');

# on charge les models de l'appli
include 'models/Db.php';
include 'models/User.php';
include 'models/Message.php';


# on include la bonne view avec le bon controller
if(!isset($object)) exit('object not set !');
if(!isset($action)) exit('action not set !');

	# le controller ...
	$controllers_file = CTRLRS_DIR . $object . '/' . $action . '.php';
	if(is_file($controllers_file)) include $controllers_file;

	# la view ...
	$view_file = VIEWS_DIR . $object . '/' . $action . '.php';
	if(is_file($view_file)) include $view_file;

