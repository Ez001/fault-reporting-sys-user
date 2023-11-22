<?php 
	
	#   Date created: 17/08/2022 
	#   Date modified: 12/05/2023  

	include_once( 'models/Admin.php' );
	
	//Creating instances
	$admin = new Admin(); 

	if ( isset( $_POST[ 'sign_up_btn' ] ) ) 
	{
		// Getting user values
		$first_name = $_POST[ 'first_name' ];
		$last_name = $_POST[ 'last_name' ];
		$email = $_POST[ 'email' ];
		$pword = $_POST[ 'pword' ]; 

		//Validating inputs
		if ( $first_name && $last_name && $email && $pword ) 
		{
			$dt_01 = [ $email ];
			$get_email = $admin->getCountByEmail( $dt_01 );

			if ( !$get_email ) 
			{
				$role = 'User';
				$pword_hash = $admin->encPword( $pword );
				$dt_01 = [ $email, $role, $pword_hash, $first_name, $last_name ];

				$add_user = $admin->addNew( $dt_01 );

				if ( $add_user ) 
				{
					$msg = $web_app->showAlertMsg( 'success', 'Record Added' );
					$clear = true;
				} 
				else 
				{
					$msg = $web_app->showAlertMsg( 'danger', 'Sorry, Record Not Added!' );
				}
				
			} 
			else 
			{
				$msg = $web_app->showAlertMsg( 'danger', 'Sorry, Email Already Exist!' );
			}			
		}
		else 
		{  
			$msg = $web_app->showAlertMsg( 'info', 'Please, Enter Username And Password.' ); 	
		}
	}

	//login interface
	include_once( 'views/sign_up.php' );
?>