<?php
   #   Date modified: 19/10/2023   

	//include_once( 'App.php' );

	class WebApp
	{
		// use App;

		function fixUrl( $page ) 
		{
			return str_replace( '-', '_', $page );
		}

		function showAlert( $msg , $top = false )
		{
			if ( $top ) 
			{
		   	$mt = 'mt-2';

	        if ( isset( $_SESSION['msg'] ) ) 
	        {
	        		$msg = $_SESSION['msg'];
	         	unset( $_SESSION['msg'] );
	        }

	        if ( $msg ) 
	        {
	           $mt = 'mt-5';
	        }
	            
	        return "<div id='main-msg' class='$mt'> $msg </div>";
			}
			else if ( isset( $msg ) ) 
		   {
            return $msg;
			}
		}
		
		function showAlertMsg( $type, $msg )
		{
			$icon_type  = '';

			if ( $type == 'success' ) 
			{
				$icon_type = "bi bi-check-circle";
			} 
			else if( $type == 'info' ) 
			{
				$icon_type = "bi bi-exclamation-circle";
			}
			else if( $type == 'danger' ) 
			{
				$icon_type = "bi bi-exclamation-octagon";
			}

			$type = "alert-$type";
			$alert = "<div class='alert $type alert-dismissible fade show mt-4' role='alert'><i class='$icon_type me-1'></i> $msg <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		      </div>";

		   return $alert;
		}
		
		// persist user input
		function persistData( $data, $update = false, $clear = false ) 
		{

			$dt = '';

			if ( $clear ) 
			{
				return $dt;
			}
			
			if ( isset( $_POST[ $data ] ) ) 
			{
				$dt = $_POST[ $data ];
			}
			else 
			{
				if ( $update ) 
				{
					$dt = $data;
				}
			}

			return $dt;
		}

		function createOptions( array $data_arr, $sel_id )
      {
      	$options = ''; 

      	foreach ( $data_arr as $dt ) 
         {
				$sel = $sel_id == $dt ? 'selected' : '';
				$options .= "<option value='$dt' $sel >$dt</option>";
         }

         return $options;
      }

      function createOptions_2( array $data_arr, $sel_id )
      {
      	$options = ''; 

      	foreach ( $data_arr as $key => $dt ) 
         {
            $sel = $sel_id == $key ? 'selected' : '';
				$options .= "<option value='$key' $sel >$dt</option>";
         }

         return $options;
      }

		function fullName( array $data )
		{
			return $data[ 'first_name' ] . ' ' . $data[ 'middle_name' ] . ' ' . $data[ 'last_name' ];
		}

		function genBatchNos( $bt_no, $bt_limit, $sel_id = 0 )
		{
			$options = '';

			for ( $i = $bt_no; $i <= $bt_limit; $i++ ) 
			{ 
				$sel = $sel_id == $i ? 'selected' : '';
				$options .= "<option value='$i' $sel> $i </option>";
			}

			echo $options;
		}

		function loadStatuses( $sel_id = '' )
      {
         $data_arr = [ 'ACTIVE', 'INACTIVE' ]; 

	      return $this->createOptions( $data_arr, $sel_id );
      }

      function loadAccountTypes( $sel_id = '' )
      {
         $data_arr = [ 'Super-Admin', 'Account', 'Data-Entry' ]; 

	      return $this->createOptions( $data_arr, $sel_id );
      }


		function getCard( $card_title, $value, $icon_name, $icon_type )
		{
			return "<div class='col-md-6'>
					<div class='card info-card revenue-card'>
						<div class='card-body'>
							<h5 class='card-title'>$card_title</span></h5>

							<div class='d-flex align-items-center'>
								<div class='card-icon rounded-circle d-flex align-items-center justify-content-center bg-$icon_type text-white'>
									<i class='$icon_name'></i>
								</div>
								<div class='ps-2'>
								  <h6 class='fs-3'>$value</h6>
								</div>
						  	</div>
						</div>
					</div>
				</div>";
		}

		function loadBatchLabels( $sel_id )
		{
		   $data_arr = range( 'A', 'Z' );

			return $this->createOptions( $data_arr, $sel_id );
		}

		function createNewDateByMonth( $date, $no ) 
		{
			$date = new DateTime( $date );
			$date->modify( "+$no month" );
			return $date->format( 'Y-m-d' );
		}
		
		function formatDate( $date, $format = 'Y-m-d' ) 
		{
			$date = new DateTime( $date );
			return $date->format( $format );
		}

		function showStatusType( $status_type )
      {
      	$status_type_x = '';
			
      	if( $status_type )
      	{
	      	$status_type_x = "<span class='badge bg-danger'> $status_type </span>";

				if ( $status_type == 'Approved' ) 
				{
					$status_type_x = "<span class='badge bg-success'> $status_type </span>";
				}
				else if ( $status_type == 'Pending' ) 
				{
					$status_type_x = "<span class='badge bg-info'> $status_type </span>";
				}
			}

			return $status_type_x;
      }

      function showRepaymentStatusType( $repay_type )
      {
      	$repay_type_x = '';

      	if( $repay_type )
      	{
	      	$repay_type_x = "<span class='badge bg-info'> $repay_type </span>";

				if ( $repay_type == 'Full' ) 
				{
					$repay_type_x = "<span class='badge bg-success'> $repay_type </span>";
				}
			}

			return $repay_type_x;
      }

      function showPaymentStatusType( $payment_type )
      {
      	$payment_type_x = '';

      	if( $payment_type )
      	{
	      	$payment_type_x = "<span class='badge bg-info'> $payment_type </span>";

				if ( $payment_type == 'Paid' ) 
				{
					$payment_type_x = "<span class='badge bg-success'> $payment_type </span>";
				}
			}

			return $payment_type_x;
      }


      function loadRepaymentStatus( $sel_id = '' )
      {
         $data_arr = [ 'Part', 'Full' ]; 

	      return $this->createOptions( $data_arr,  $sel_id );
      }

      function loadStatus( $sel_id = '' )
      {
         $data_arr = [ 'Pending', 'Rejected', 'Approved' ]; 

	      return $this->createOptions( $data_arr,  $sel_id );
      }

      function loadPaymentStatus( $sel_id = '' )
      {
         $data_arr = [ 'Paid', 'Unpaid' ]; 

	      return $this->createOptions( $data_arr,  $sel_id );
      }

	}
?>