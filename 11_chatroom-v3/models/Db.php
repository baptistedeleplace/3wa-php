<?php

Class Db
{

/**
	Connexion à la base de donnée
*/
	public function get_db_link ()
	{

		$this->db_link = mysqli_connect(
			'localhost', 	# adresse du serveur
			'root',			# login
			'',
	//		'troiswa',		# password
			'chat'		# nom de la base de donnée
		);

	}

}