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

		# url du endpoint
		$url = 'http://5inq.fr/3wa/chatroom/api/addMessage.php';

		# initialisation de cURL
		$ch = curl_init();

		# on présente nos variables POST
		$fields = array(
			'nickname' => $nickname,
			'message' => $content,
		);
		$postfields = '';
		foreach($fields as $key=>$value) { $postfields .= $key.'='.$value.'&'; }

		# execution de la requête HTTP via cURL
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, count($fields)); # cf. CURLOPT_POST
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);

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