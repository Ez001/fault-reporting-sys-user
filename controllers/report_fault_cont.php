<?php 
	
	#   Date created: 25/04/2023
   #   Date modified: 21/10/2023 

	//auth
	include_once( 'user_auth.php' );

	//App Function
	include_once( 'models/Fault.php' );
	include_once( 'models/ReportFault.php' );

	//Creating Instances
	$faults = new Fault();
	$report_fault = new ReportFault();

	if ( isset( $_POST['add_btn'] ) ) 
	{
		$fault = $_POST['fault'];
		$description = $_POST['description'];

		if ( $fault && $description ) 
		{
			$dt_01 = [ $user_id, $fault, $description ];

			$add_fault = $report_fault->addNew( $dt_01 );

			if ( $add_fault ) 
			{
				$msg = $web_app->showAlertMsg( 'success', 'Fault Reported!' );
			} 
			else 
			{
				$msg = $web_app->showAlertMsg( 'danger', 'Sorry, Fault Not Reported!' );
			}
			
		} 
		else 
		{
			$msg = $web_app->showAlertMsg( 'danger', 'Please, Enter all Fields!' );
		}
		
	}

	$fault_arr = $faults->getAll( [] );
	$r_fault_arr = $report_fault->getAllByUserId( [ $user_id ] );

	//Report Fault interface
	include_once( 'views/report_fault.php' );
 ?>