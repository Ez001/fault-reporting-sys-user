<?php
	 #   Date modified: 27/03/2023  

	trait App
	{
		private $con;

		// Initializing Database
		function __construct()
		{
			$this->con = $this->connect();
		}

		// Initializing Database
		public function connect()
		{
			try
			{
				$this->con = new PDO( 'mysql:host=' . HOST . ';dbname=' . DB , USER, PWORD );
				$this->con->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
				$this->con->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
				$this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				
				//echo 'connected';
				return $this->con;
			} 
			catch ( PDOException $e )
			{
				echo 'There was an error! unable to connect to DB<br/>';// . $e->getMessage();
				return false;
			}	 
		}

		function runQuery( $sql, $data = [] )
		{
			$query = $this->con->prepare( $sql );
			$row = $query->execute( $data );

	    	// checking result 
			if ( $row )
			{
				return true;
			}
		}

		function runQuery_2( $sql, $data = [] )
		{
			$query = $this->con->prepare( $sql );
			$query->execute( $data );
			
	    	// checking result 
			if ( $query->rowCount() > 0 ) 
			{
				return true;
			}
		}

		function fetchData( $sql, $data = [] )
		{
			$query = $this->con->prepare( $sql );
			$query->execute( $data );

	    	// checking result 
			if ( $row = $query->fetch( PDO::FETCH_ASSOC ) ) 
			{
				return $row;
			}
		}

		function fetchAllData( $sql, $data = [] )
		{ 
			$query = $this->con->prepare( $sql );
			$row = $query->execute( $data );
			$dt = [];

	    	// checking result 
			while ( $row = $query->fetch( PDO::FETCH_ASSOC ) )
			{
				array_push( $dt, $row );
			}

			return $dt;
		}

	}
?>