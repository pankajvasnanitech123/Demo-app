<?php
	use Cake\Core\Configure;
	
	define('ADMIN',1);
	define('USER',2);
	define('AUTHOR',3);
	
	$config['user_types']	=	array(
		USER	=>	'User',
		AUTHOR	=>	'Author'
	);
	
	$config['user_types_name'] = array(
		'Pankaj'	=>    'PANKAJ',
		'Harry'		=>	  'HARRY'
	);
?>
