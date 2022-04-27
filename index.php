<?php include('config.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Projeto 01</title>
  	<link href="<?php echo INCLUDE_PATH;?>style/fontawesome/css/all.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH;?>style/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">
	<link rel="icon" type="image/x-icon" href="<?php echo INCLUDE_PATH?>/images/favicon.ico">
	<meta charset="utf-8" />

</head>
<body>
<base base="<?php INCLUDE_PATH ?>"/>

	<?php 
		$url = isset($_GET['url']) ? $_GET['url'] : 'home';

		switch ($url) {
			case 'sobre';
				echo '<target target="sobre" />';
				break;
			
			case 'servicos':
				echo '<target target="servicos" />';
				break;
		}
	?>

<header>
		<div class="center">
			<div class="cabecalho">
				<div class="logo left"><a href="<?php echo INCLUDE_PATH;?>"><img src="<?php echo INCLUDE_PATH;?>images/logo-sphere.png"></a></div><!--logo-->
				<nav class ="desktop right">
					<ul>
						<li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
						<li><a href="<?php echo INCLUDE_PATH;?>sobre">Sobre</a></li>
						<li><a href="<?php echo INCLUDE_PATH;?>servicos">Serviços</a></li>
						<li><a realtime="contato" href="<?php echo INCLUDE_PATH;?>contato">Contato</a></li>
					</ul>
				</nav>
				<nav class ="mobile right">
					<div class="botao-menu-mobile">
						<i class="fa-solid fa-bars"></i>
					</div>
					<ul>
						<li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
						<li><a href="<?php echo INCLUDE_PATH;?>sobre">Sobre</a></li>
						<li><a href="<?php echo INCLUDE_PATH;?>servicos">Serviços</a></li>
						<li><a realtime="contato" href="<?php echo INCLUDE_PATH;?>contato">Contato</a></li>
					</ul>
				</nav>
			</div> <!--cabecalho-->
		<div class="clear"></div>
		</div>	<!--center-->
	</header>


	<div class="container-principal">
	<?php

		if (file_exists('pages/'.$url.'.php')){
			include('pages/'.$url.'.php');
		}else{
			if ($url != 'sobre' && $url != 'servicos') {
				$pagina404 = true;
				include('pages/404.php');
			}else{
				include('pages/home.php');
			}
		}
	?>
	</div> <!--container-principal-->

	<footer>
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div><!--center-->
	</footer>

	<script src="<?php echo INCLUDE_PATH;?>js/constants.js"></script>
	<script src="<?php echo INCLUDE_PATH;?>js/jquery-3.6.0.min.js"></script>
	<script src="<?php echo INCLUDE_PATH;?>js/scripts.js"></script>
		<?php 
		if ($url == 'home' || $url == 'n') {
	?>
	<script src="<?php echo INCLUDE_PATH;?>js/slider.js"></script>
	<?php } ?>
	<?php 
		if ($url == 'contato') {
	?>
			<script src="<?php echo INCLUDE_PATH;?>js/map.js"></script>
	<?php } ?>
	<script src="<?php echo INCLUDE_PATH;?>js/exemplo.js"></script>
	
</body>
</html>