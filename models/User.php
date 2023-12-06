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

	}

?>