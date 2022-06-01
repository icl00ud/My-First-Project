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
	function catchRole($indice){

		return Panel::$cargos[$indice];
	}

	function selectedMenu($par){
		$url = explode('/',@$_GET['url'])[0];
		if ($url == $par) {
			echo 'class = "menu-active"';
		}
	}

	function verifyPermissionMenu($permission){
		if ($_SESSION['cargo'] >= $permission) {
			return;
		}else{
			echo 'style="display:none;"';
		}
	}

	function verifyPermissionPage($permission){
		if ($_SESSION['cargo'] >= $permission) {
			return;
		}else{
			include('panel/pages/permission-denied.php');
			die();
		}
	}
?>