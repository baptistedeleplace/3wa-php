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

	public function add ($content = '')
	{

		# on nettoie les variables d'input
		$nickname = (new User)->get_connected_user();
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
				NOW(),
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

		# url du endpoint
		$url = 'http://5inq.fr/3wa/chatroom/api/getMessages.php';

		# requète en GET
		$json = file_get_contents($url);

		# on parse le JSON obtenu en tableau PHP
		$datas = json_decode($json, true);

		# On retravaille légèrement ces variables
		foreach ($datas as $data)
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