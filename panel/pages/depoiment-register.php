<div class="box-content w100">
    <h2><i class="fa-solid fa-pen"></i> Adicionar Depoimentos</h2>

    <form id="edit-user" method="post" enctype="multipart/form-data">

        <?php 
			if (isset($_POST['acao'])) {
                
                if (Panel::insert($_POST)) {
                    Panel::alert('sucesso','O cadastro foi feito com sucesso!');
                }else {
                    Panel::alert('erro','Campos vazios!');
                }
                
				
				
            }
	    ?>

        <div class="form-group">
            <label>Nome da pessoa</label>
            <input type="text" name="nome" placeholder="Ex: João"></br>
            <label class="label-depoiment">Depoimento</label>
            <textarea name="depoimento" placeholder="Escreva seu depoimento aqui..."></textarea></br>
            <label>Data:</label>
            <input type="text" name="data" formato="data"></br>
            <input type="hidden" name="name_table" value="tb_site.depoiments">
            <input type="submit" name="acao" value="Cadastrar">
        </div>
    </form>
</div>