<?php 
   #   Date modified: 21/11/2023 

	//auth
	include_once( 'user_auth.php' );

	//App Function
	include_once( 'models/ReportFault.php');

	//Creating Instance
	$reported_fault = new ReportFault();


	$total_faults = $reported_fault->getCountByUserId( [ $user_id ] );
	$total_completed_faults = $reported_fault->getCountByStatus( [ $user_id, 'Completed' ] );
	$total_pending_faults = $reported_fault->getCountByStatus( [ $user_id, 'Pending' ] );

	//Dashboard interface
	include_once( 'views/dashboard.php' );
 ?>