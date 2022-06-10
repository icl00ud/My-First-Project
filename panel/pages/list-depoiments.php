<?php 
    $depoiments = Panel::selectAll('tb_site.depoiments');
?>

<div class="box-content w100">
    <h2><i class="fa-solid fa-list"></i> Listar Depoimentos</h2>

    <table>
        <tr>
            <td>Nome</td>
            <td>Data</td>
            <td>Editar</td>
            <td>Deletar</td>
        </tr>

        <?php 
            foreach ($depoiments as $key => $value) {    
        ?>

        <tr>
            <td><?php echo $value['nome']; ?></td>
            <td><?php echo $value['data']; ?></td>
            <td><a class="btn" href=""><i class="fa-solid fa-pencil"></i></a></td>
            <td><a class="btn" href=""><i class="fa-solid fa-trash"></i></a></td>
        </tr>

        <?php 
            }
        ?>

    </table>

</div><!-- box-content -->
