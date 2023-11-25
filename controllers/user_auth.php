<?php 
	#   Date modified: 12/05/2023  

	include_once( 'models/User.php' );

	//Creating instances
	$user = new User();  
	$user_id = $user->getLoggedUser();

	//when not logged in
	if ( !$user_id ) 
	{
		header( "Location: ./", true, 301 );
		exit();
	}

?>