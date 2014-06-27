<?php

Class User extends Db
{

	public $nickname = '';

/**
	Constructeur ...
*/
	public function __construct ($n = '')
	{
		$this->nickname = $n;
		return true;
	}

/**
	Enregistrement de user en session
*/

	public function login ()
	{
		$_SESSION['nickname'] = $this->nickname;
		return true;
	}

/**
	Enregistrement de user en session
*/

	public static function is_login ()
	{
		if(isset($_SESSION['nickname']) and !empty($_SESSION['nickname']))
		{
			return true;
		}

		return false;
	}

/**
	Donne l'utilisateur connecté
*/

	public function get_connected_user ()
	{
		if(!$this->is_login())
		{
			return false;
		}
		return $_SESSION['nickname'];
	}

/**
	Donne la liste des utilisateurs connectés
*/

	public function get_connected_users ()
	{

		# connection à la base de donnée dès la construction de l'objet
		$this->get_db_link();

		$sql = "
			SELECT 	`nickname`
			FROM 	`messages`
			WHERE 	TIMESTAMPDIFF(MINUTE, `created_at`, NOW()) < 30
			GROUP BY `nickname`
			ORDER BY `message_id` DESC
		";

		# envoi de cette requête à MySQL
		$q = mysqli_query($this->db_link, $sql);

		$users = array();

		# on stocke dans un tableau provisoire les données
		while ($data = mysqli_fetch_array($q, MYSQLI_ASSOC))
		{
			$users[] = ucfirst(utf8_encode($data['nickname']));
		}

		return $users;

	}



}
