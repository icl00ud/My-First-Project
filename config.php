<?php 
	
	session_start();

	
	define('INCLUDE_PATH','http://localhost/Projeto_01/');
	define('INCLUDE_PATH_PANEL', INCLUDE_PATH.'panel/');

	//Connect to database
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'projeto_01');
	//

	//Functions
	function catchRole($cargo){
		$arr = [
			'0' => 'Normal',
			'1' => 'Sub-admin',
			'2' => 'Admin'
		];

		return $arr[$cargo];
	}
?>