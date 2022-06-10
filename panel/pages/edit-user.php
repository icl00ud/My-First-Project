<div class="box-content w100">
    <h2><i class="fa-solid fa-pen"></i> Editar usuario</h2>

	<form  id="edit-user" method="post" enctype="multipart/form-data">

	<?php 
			if (isset($_POST['editar-usuario'])) {
				//Formulário enviado

				$name = $_POST['nome'];
				$password = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$actual_image = $_POST['actual_image'];
				$user = new User(); //Instanciada aqui fora para não precisar instanciar duas vezes dentro do laço
				
				if ($imagem['name'] != '') {
					//Existe uma imagem
					if (Panel::imageValid($imagem)) {
						Panel::deleteFile($actual_image); //função que deleta a imagem antiga e mantém a nova
						$imagem = Panel::uploadImage($imagem);
						if($user -> attUser($name,$password,$imagem)){
							Panel::alert('sucesso','Atualizado com sucesso junto com a imagem!');
						}else{
							Panel::alert('erro','Ocorreu um erro ao atualizar junto com a imagem...');
						}
					}else{
						Panel::alert('erro', 'O formato da imagem não é válido');
					}
				}else{
					//Não existe uma imagem adicionada, então imagem nova igual imagem antiga
					$imagem = $actual_image;
					if($user ->attUser($name,$password,$imagem)){
						Panel::alert('sucesso','Atualizado com sucesso!');
					}else{
						Panel::alert('erro','Ocorreu um erro ao atualizar...');
					}
				}

			}
	?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php echo $_SESSION['nome'] ?>" required></br>
			<label>Senha:</label>
			<input type="password" name="password" value="<?php echo $_SESSION['password'] ?>" required>
			<label>Imagem:</label>
			<input type="file" name="imagem"/>
			<input type="hidden" name="actual_image" value="<?php echo $_SESSION['img'] ?>">
			
			<input type="submit" name="editar-usuario" value="Editar">
		</div>
	</form>
</div>


