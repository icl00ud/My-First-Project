<?php 
	if (isset($_COOKIE['lembrar'])) {
		$user = $_COOKIE['user'];
		$password = $_COOKIE['password'];
		$sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.users` WHERE user = ? AND password = ?");
		$sql->execute(array($user,$password));
		if($sql->rowCount() == 1){
			$info = $sql->fetch();
			$_SESSION['login'] = true;
			$_SESSION['user'] = $user;
			$_SESSION['password'] = $password;
			$_SESSION['cargo'] = $info['cargo'];
			$_SESSION['nome'] = $info['nome'];
			$_SESSION['img'] = $info['img'];
			header('Location: '.INCLUDE_PATH_PANEL);
			die();
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PANEL ?>style/style.css">
	<title>Login Panel</title>
</head>

<body>
	<section class="login-session">
		<div class="box-error">
			<?php
					if(isset($_POST['acao'])){
						$user = $_POST['user'];
						$password = $_POST['password'];
						$sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.users` WHERE user = ? AND password = ?");
						$sql->execute(array($user,$password));
						if($sql->rowCount() == 1){
							$info = $sql->fetch();
							//Logamos com sucesso.
							$_SESSION['login'] = true;
							$_SESSION['user'] = $user;
							$_SESSION['password'] = $password;
							$_SESSION['cargo'] = $info['cargo'];
							$_SESSION['nome'] = $info['nome'];
							$_SESSION['img'] = $info['img'];
							if (isset($_POST['lembrar'])) {
								setcookie('lembrar', true, time()+(60*60*24), '/');
								setcookie('user', $user, time()+(60*60*24), '/');
								setcookie('password', $password, time()+(60*60*24), '/');
							}
							header('Location: '.INCLUDE_PATH_PANEL);
							die();
						}else{
							//Falhou
							echo '<div class="erro-box"><i class="fa fa-times"></i> Usu??rio ou senha incorretos!</div>';
						}
					}
				?>
		</div>
		<!--box-error-->
		<form method="post" class="login">

			<img src="../images/shenlong-login.png">
			<input placeholder="Usu??rio" type="text" name="user" required></br>
			<input placeholder="Senha" type="password" name="password" required></br>
			<div class="form-group-login left">
				<input type="submit" name="acao" value="Login">
			</div>
			<div class="form-group-login right">
				<label for="lembrar">Lembrar</label>
				<input type="checkbox" name="lembrar">
			</div>
			<div class="clear"></div>
		</form>
	</section>
</body>

</html>