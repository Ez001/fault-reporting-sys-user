<?php  
	#   Date modified: 12/11/2023  

	include_once( 'models/User.php' );
	
	//Creating instances
	$user = new User(); 

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
			$get_email = $user->getCountByEmail( $dt_01 );

			if ( !$get_email ) 
			{
				$role = 'User';
				$pword_hash = $user->encPword( $pword );
				$dt_01 = [ $email, $role, $pword_hash, $first_name, $last_name ];

				$add_user = $user->addNew( $dt_01 );

				if ( $add_user ) 
				{
					$msg = $web_app->showAlertMsg( 'success', 'Registration Completed!' );
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