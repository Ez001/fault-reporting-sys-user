<?php
	#   Date modified: 22/09/2023  

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class ReportFault
	{
		//using Namespaces
		use App {
			App::__construct as private __appConst;
		}

		use Encryption;

		protected $table = '';
		const DB_TABLE = 'report_faults';

		function __construct()
	 	{
			$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

	 	function addNew( array $dt ) 
		{	
			$sql = "INSERT INTO $this->table ( `user_id`, `fault_id`, `description` ) VALUES ( ?, ?, ? )";
			$res = $this->runQuery( $sql, $dt );
			
			return $res ?? false;	  
		}

	 	function getAllByUserId( array $dt )
		{
			$sql = "SELECT * FROM $this->table WHERE user_id = ?";
			$res = $this->fetchAllData( $sql, $dt );

			return $res ?? [];
		}

		function getCountByUserId( array $dt )
		{
			$sql = "SELECT COUNT( id ) AS total FROM $this->table WHERE user_id = ?";
			$res = $this->fetchData( $sql, $dt );

			return $res['total'] ?? [];
		}

		function getCountByStatus( array $dt )
		{
			$sql = "SELECT COUNT( id ) AS total FROM $this->table WHERE user_id = ? AND status = ?";
			$res = $this->fetchData( $sql, $dt );

			return $res['total'] ?? [];
		}

		function updateReviewStatusById( array $dt, $negative = false ) 
		{
			if ( $negative ) 
			{
				$sql = "UPDATE $this->table SET `status` = ?, `review_status` = ? WHERE id = ?";
			}
			else
			{
				$sql = "UPDATE $this->table SET `review_status` = ? WHERE id = ?";
			}

			$res = $this->runQuery_2( $sql, $dt );

			return $res ?? false;
		}


	}

?>