<?php

include 'model_user.php';

$john = new User('John Petterson');

$john->year_of_birth = 1983;

if($john->has_nickname())
{

	echo 'Hello, my name is '
		 . $john->nickname
		 . ' and I am '
		 . $john->get_age()
		 . ' years old.';

} else {

	echo ':(';

}
