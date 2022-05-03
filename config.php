<?php
	include('classes/Site.php');
	session_start();
	
	
	date_default_timezone_set('America/Sao_Paulo');
	
	define('INCLUDE_PATH','http://localhost/Projeto_01/');
	define('INCLUDE_PATH_PANEL', INCLUDE_PATH.'panel/');
	define('BASE_DIR_PANEL', __DIR__.'/panel');

	//Conectar ao servidor
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'projeto_01');
	
	//Constantes para o painel de controle
	define('BUSINESS_NAME', 'Business Name');

	//Funções
	function catchRole($cargo){
		$arr = [
			'0' => 'Normal',
			'1' => 'Sub-admin',
			'2' => 'Admin'
		];

		return $arr[$cargo];
	}
?>