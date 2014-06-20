<?php


# création d'une connection au serveur MySQL
# voir http://www.w3schools.com/php/func_mysqli_connect.asp
function get_db_link ()
{

	return mysqli_connect(
		'localhost', 	# adresse du serveur
		'root',			# login
		'',
//		'troiswa',		# password
		'legomania'		# nom de la base de donnée
	);

}

