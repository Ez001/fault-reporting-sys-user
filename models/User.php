<?php
	#   Date modified: 22/09/2023  

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class User
	{
		//using Namespaces
		use App {
			App::__construct as private __appConst;
		}

		use Encryption;

		protected $table = '';
		const DB_TABLE = 'users';

		function __construct()
	 	{
			$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

	 	function addNew( array $dt ) 
		{	
			$sql = "INSERT INTO $this->table ( email, role, pword, first_name, last_name ) VALUES ( ?, ?, ?, ?, ? )";
			$res = $this->runQuery( $sql, $dt );
			
			return $res ?? false;	  
		}

		function getLoggedUser()
		{
			return $_COOKIE[ APP_SESS ] ?? 0;
		}

		function getLogin( array $dt ) 
		{
			$sql = "SELECT * FROM $this->table WHERE email = ?";
			$res = $this->fetchData( $sql, $dt );

			return $res ?? [];
		}

		function getCountByEmail( array $dt ) 
		{
			$sql = "SELECT COUNT( id ) AS total FROM $this->table WHERE email = ?";
			$res = $this->fetchData( $sql, $dt );

			return $res['total'] ?? 0;
		}

		function getAll( array $dt ) 
		{
			$sql = "SELECT * FROM $this->table ";
			$res = $this->fetchAllData( $sql, $dt );

			return $res ?? [];
		}

		function updateById( array $dt ) 
		{
			$sql = "UPDATE $this->table SET `uname` = ?, `email` = ?, `full_name` = ?, `status` = ?, `type` = ? WHERE id = ?";
			$res = $this->runQuery_2( $sql, $dt );

			return $res ?? false;
		}

	}

?>