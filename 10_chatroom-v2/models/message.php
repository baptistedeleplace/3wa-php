<?php

Class Message extends Db
{

	public $user_nickname = '';
	public $content = '';

/**
	Constructeur ...
*/
	public function __construct ()
	{
		# connection à la base de donnée dès la construction de l'objet
		$this->get_db_link();
	}

/**
	Ajout d'un message
*/

	public function add ($nickname = '', $content = '')
	{

		# on nettoie les variables d'input
		$nickname = mysqli_real_escape_string($this->db_link, $nickname);
		$content = mysqli_real_escape_string($this->db_link, $content);

		# on créé notre requête SQL ...
		$sql = "

			INSERT INTO  `messages`
			(
				`created_at`,
				`nickname`,
				`content`
			)

			VALUES
			(
				'" . date("Y-m-d H:i:s") . "',
				'" . $nickname . "',
				'" . $content . "'
			)

		";

		# envoi de cette requête à MySQL
		mysqli_query($this->db_link, $sql);

		return true;
	}

/**
	Liste de messages
*/
	public function get_all ($limit = 30)
	{
		$messages = array();

		# on créé le premier morceau de la chaine (string)
		# de notre future requête SQL ...
		$sql = "
			SELECT *
			FROM  `messages`
			ORDER BY `message_id` DESC
			LIMIT 0 , " . $limit . "
		";

		# envoi de cette requête à MySQL
		$q = mysqli_query($this->db_link, $sql);

		# on stocke dans un tableau provisoire les données
		while ($data = mysqli_fetch_array($q, MYSQLI_ASSOC))
		{
			$messages[] = array(
				'message_id' => $data['message_id'],
				'time_day' => date('m/d', strtotime($data['created_at'])),
				'time_hour' => date('G:i', strtotime($data['created_at'])),
				'content' => utf8_encode($data['content']),
				'content_html' => nl2br(utf8_encode($data['content'])),
				'nickname' => ucfirst(utf8_encode($data['nickname'])),
			);
		}

		return $messages;
	}

}