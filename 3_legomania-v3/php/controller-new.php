<?php

session_start();

include 'functions.php';

# s'il n'est pas authentifié il est éjecté de la page
if(!is_admin()){
	header("location: access.php");
}

$categories = get_all_categories();
