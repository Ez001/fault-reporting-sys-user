<?php 
	#   Date modified: 21/11/2023 

	//auth
	include_once( 'user_auth.php' );

	//App Function
	include_once( 'models/Fault.php' );
	include_once( 'models/ReportFault.php' );

	//Creating Instances
	$faults = new Fault();
	$report_fault = new ReportFault();

	$js_modules = [ 'report_fault' ];

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

	else if ( isset( $_POST[ 'set_review_status' ] ) ) 
   {
      ob_clean();

		$reported_fault_id = $_POST['reported_fault_id'];
		$review_status = $_POST['review_status'];

		if ( $reported_fault_id && $review_status ) 
		{
			if ( $review_status == 'Satisfied' ) 
			{
				$update_r_status = $report_fault->updateReviewStatusById( [ $review_status, $reported_fault_id ] );
			}
			else
			{
				$update_r_status = $report_fault->updateReviewStatusById( [ 'Pending', $review_status, $reported_fault_id ], true );
			}
		}
		
		$_SESSION[ 'msg' ] = $update_r_status ?	$web_app->showAlertMsg( 'success', 'Review Status Updated!' ) : $web_app->showAlertMsg( 'success', 'Sorry, Review Status Not Updated!' );
		
      echo $_SESSION[ 'msg' ];

      ob_end_flush();
      exit();
   }

	$fault_arr = $faults->getAll( [] );
	$r_fault_arr = $report_fault->getAllByUserId( [ $user_id ] );

	//Report Fault interface
	include_once( 'views/report_fault.php' );
 ?>