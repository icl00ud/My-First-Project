<?php 
    verifyPermissionPage(2);
?>

<div class="box-content w100">
    <h2><i class="fa-solid fa-pen"></i> Editar usuario</h2>

    <form id="edit-user" method="post" enctype="multipart/form-data">

        <?php 
			if (isset($_POST['editar-usuario'])) {
                $login = $_POST['login'];
                $name = $_POST['nome'];
				$password = $_POST['password'];
				$imagem = $_FILES['imagem'];
                $cargo = $_POST['cargo'];

                if ($login == '') {
                    Panel::alert('erro','O login está vazio!');
                }else if($name == ''){
                    Panel::alert('erro','O nome está vazio!');
                }else if($password == ''){
                    Panel::alert('erro','A senha está vazio!');
                }else if($cargo ==''){
                    Panel::alert('erro','O cargo não está selecionado!');
                }else if($imagem['name'] == ''){
                    Panel::alert('erro','A imagem precisa estar selecionada!');
                }else{
                    // Pode cadastrar //
                    if($cargo > $_SESSION['cargo']){
                        Panel::alert('erro','Você precisa selecionar um cargo menor que o seu!');
                    }else if(Panel::imageValid($imagem) == false){
                        Panel::alert('erro','O formato especificado não está correto!');
                    }else if(User::userExist($login)){
                        Panel::alert('erro','O login já existe');
                    }else{
                        //  Cadastrar no banco de dados //
                        $user = new User();
                        $imagem = Panel::uploadImage($imagem);
                        $user = User::registerUser($login,$password,$imagem,$name,$cargo);
                    }
                }


				 // Instanciada aqui fora para não precisar instanciar duas vezes dentro do laço //
				Panel::alert('sucesso','O cadastro foi feito com sucesso!');
				
            }
	?>

        <div class="form-group">
            <label>Login:</label>
            <input type="text" name="login"></br>
            <label>Nome:</label>
            <input type="text" name="nome"></br>
            <label>Senha:</label>
            <input type="password" name="password"></br>
            <label class="cargo">Cargo:</label>
            <select name="cargo">
                <?php 
                    foreach (Panel::$cargos as $key => $value) {
                        if($key < $_SESSION['cargo']) {
                        echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }
                ?>
            </select></br>
            <label>Imagem:</label>
            <input type="file" name="imagem" /></br>


            <input type="submit" name="editar-usuario" value="Editar">
        </div>
    </form>
</div>