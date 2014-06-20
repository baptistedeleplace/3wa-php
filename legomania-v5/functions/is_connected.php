<?php

# Renvoi 'true' si l'internaute est authentifié, 'false' sinon
function is_connected ()
{
	if(isset($_SESSION['user_id']) and $_SESSION['user_id'] == true)
	{
		return true;
	}
	return false;
}
