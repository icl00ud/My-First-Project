<?php 
	if (isset($_GET['loggout'])) {
		Panel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Control Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo INCLUDE_PATH;?>style/fontawesome/css/all.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PANEL ?>style/style.css">
</head>
<body>
	<div class="menu">
		<div class="menu-wrap">
			<div class="box-user">
				<?php
					if ($_SESSION['img'] == '') { 
				?>	
				<!--Se o usuário não tiver uma foto, então carregue o ícone-->
					<div class="avatar-user">
						<i class="fa-solid fa-user-tie"></i>
					</div><!--avatar-user-->
				<?php 
					}else{ ?> 
				<!--Se o usuário tem uma foto, então carregue a foto-->
					<div class="image-user">
						<img src="<?php echo INCLUDE_PATH_PANEL ?>uploads/<?php echo $_SESSION['img'] ?>">
					</div><!--image-user-->
				<?php } ?>
			</div><!--box-user-->
			<div class="user-name">
				<!--Pega o nome da sessão e printa esse nome-->
				<p class="name"><?php echo $_SESSION['nome']; ?></p> 
				<!--Existe uma função em config.php que pega o número do cargo no banco de dados e transforma em um texto com o nome do cargo-->
				<p class="cargo"><?php echo catchRole($_SESSION['cargo']); ?></p> 
			</div><!--user-name-->
			<div class="menu-items">
				<h2>Página Inicial</h2>
				<a href="<?php echo INCLUDE_PATH_PANEL ?>">Home</a>
				<h2>Gestão</h2>
				<a href="<?php echo INCLUDE_PATH_PANEL ?>pages/depoiment-register.php">Listar Depoimentos</a>
				<a href="">Listar Serviços</a>
				<h2>Cadastro</h2>
				<a href="">Cadastrar Depoimento</a>
				<a href="">Cadastrar Serviço</a>
				<h2>Administração do painel</h2>
				<a href="">Editar Usuário</a>
				<a href="">Adicionar Usuários</a>
				<a href="">Listar Slides</a>
				<h2>Configuração geral</h2>
				<a href="">Editar</a>
			</div><!--menu-items-->
		</div><!--menu-wrap-->
	</div><!--menu-->

<header>

<div class="pai-cabecalho">
	<div class="menu-button">
		<i class="fa-solid fa-bars"></i>
	</div>

	<div class="loggout">
		<a href="<?php echo INCLUDE_PATH_PANEL;?>?loggout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
	</div> <!--loggout-->
</div> <!--pai-cabecalho-->

	<div class="clear"></div>


</header>

	<div class="content"><!--Onde vai ficar tudo do painél-->
		
		<?php Panel::loadPage(); ?>

	</div><!--content-->

<script src="<?php INCLUDE_PATH?>../js/jquery-3.6.0.min.js"></script>
<script src="<?php INCLUDE_PATH_PANEL?>js/main.js"></script>
</body>
</html>