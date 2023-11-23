<?php 
	#   Date modified: 12/05/2023  

	include_once( 'models/Admin.php' );

	//Creating instances
	$admin = new Admin();  
	$user_id = $admin->getLoggedAdmin();

	//when not logged in
	if ( !$user_id ) 
	{
		header( "Location: ./", true, 301 );
		exit();
	}

?>