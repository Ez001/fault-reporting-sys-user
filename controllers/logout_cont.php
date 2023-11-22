<?php 
	#   Date modified: 12/05/2023  

	//clearing all 
	$_SESSION = [];
	$_COOKIE = [];
	session_destroy(); 
	
	setcookie( APP_SESS, '', time() - APP_SESS_TIME );
	
	header( "Location: ./login", true, 301 );
   exit();

?>