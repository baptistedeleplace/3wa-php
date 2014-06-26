<?php

session_start();

include 'functions.php';

# s'il n'est pas authentifié il est éjecté de la page
if(!is_connected()){
	header("location: auth.php");
}

$categories = get_all_categories();
