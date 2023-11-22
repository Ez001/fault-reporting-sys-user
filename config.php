<?php
   #   Date modified: 12/05/2023  

	const ENVIRONMENT = 'Test';//Test Live

   //DB Config
	const HOST = 'localhost';
	const USER = 'root';
	const PWORD = '';
	const DB = 'fault_report_app_db';

	$msg = '';
	$clear = false;
	$website_title = 'Admin - Muazu Foundation Loan';
	$test_email = 'ezra00100@gmail.com';

	const APP_SESS = 'fault_user_id';
	const APP_SESS_TIME = 3500;

	//url
   $server_name = ENVIRONMENT == 'Test' ? 'http://' : 'https://';
   $server_name .= $_SERVER['SERVER_NAME'];
   $uri = $_SERVER['REQUEST_URI'];
   $app_url = ( strlen( $uri ) > 1 ) ? "$server_name$uri" : "$server_name";

   //directory
   $root_dir = dirname( __DIR__ );
   $cur_dir = dirname( __FILE__ );
   //echo getcwd();

   //$upload_dir = "$cur_dir/uploads";
   //$upload_url = "$server_name/uploads";
   //$server_name_2 = 'http://';
   //$upload_dir = '../uploads';
   //$upload_url = "$server_name_2/uploads";

	$js_modules = [];
?> 