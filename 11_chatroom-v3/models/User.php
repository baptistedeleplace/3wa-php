<?php

Class User
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

}
