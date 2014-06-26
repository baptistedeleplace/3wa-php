<?php

# création d'une connection au serveur MySQL
# voir http://www.w3schools.com/php/func_mysqli_connect.asp
$link = mysqli_connect(
	'localhost', 	# adresse du serveur
	'root',			# login
	'troiswa',		# password
	'legomania'		# nom de la base de donnée
);

