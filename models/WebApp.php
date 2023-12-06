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

		function loadReviewStatuses( $sel_id = '' )
      {
         $data_arr = [ 'Satisfied', 'Unsatisfied' ]; 

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

		function showStatusType( $status_type )
      {
      	$status_type_x = '';
			
      	if( $status_type )
      	{
	      	$status_type_x = "<span class='badge bg-warning'> $status_type </span>";

				if ( $status_type == 'Completed' ) 
				{
					$status_type_x = "<span class='badge bg-success'> $status_type </span>";
				}
			}

			return $status_type_x;
      }
	}
?>