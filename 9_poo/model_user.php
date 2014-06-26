<?php

// ici la déclaration du MODEL User

Class User
{

	public $nickname = '';
	public $year_of_birth = 1950;

	public function __construct ($n = '')
	{

		$this->nickname = $n;

	}


	public function has_nickname ()
	{

		if($this->nickname) {
			return true;
		}

		return false;

	}

	public function get_age ()
	{

		return date('Y') - $this->nickname;

	}
}