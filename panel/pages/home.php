<?php 
	//Lista os usuários online
    $usersOnline = Panel::listUsersOnline();
	//Aqui pega todas as visitas para adicionar dinamicamente no painel de controle
	$catchTotalVisits = MySql::connect()->prepare("SELECT * FROM `tb_admin.visits`");
	$catchTotalVisits -> execute();
	$catchTotalVisits = $catchTotalVisits -> rowCount();
    //Pega as visitas de hoje
	$catchTodayVisits = MySql::connect()->prepare("SELECT * FROM `tb_admin.visits` WHERE day = ?");
	$catchTodayVisits -> execute(array(date('Y-m-d')));
	$catchTodayVisits = $catchTodayVisits -> rowCount();
?>
<div class="box-content w100">
	<h2 id="title-boxes">Control Panel - <?php echo BUSINESS_NAME ?></h2>

	<div class="box-metrics">
		<div class="box-metrics-single w33 left">
			<div class="box-metrics-wrapper">
				<h2>Usuários Online</h2>
				<p><?php echo count($usersOnline);?></p>
			</div><!--box-metrics-wrapper-->
		</div><!--box-metrics-single-w33-left-->
		<div class="box-metrics-single w33 left">
			<div class="box-metrics-wrapper">
				<h2>Total de Visitas</h2>
				<p><?php echo $catchTotalVisits; ?></p>
			</div><!--box-metrics-wrapper-->
		</div><!--box-metrics-single-w33-left-->
		<div class="box-metrics-single w33 left">
			<div class="box-metrics-wrapper">
				<h2>Visitas Hoje</h2>
				<p><?php echo $catchTodayVisits; ?></p>
			</div><!--box-metrics-wrapper-->
		</div><!--box-metrics-single-w33-left-->
		<div class="clear"></div>
	</div><!--box-metrics-->
</div><!--box-content-->

<div class="box-content w100">
<h2><i class="fa-solid fa-users"></i></i>Usuários online</h2>
    <div class="responsive-table">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div><!--col-->
            <div class="col">
                <span>Última Ação</span>
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->

		<?php 
			foreach ($usersOnline as $key => $value) {
		?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['ip'] ?></span>
            </div><!--col-->
            <div class="col">
                <span><?php echo date('d/m/Y H:i:s',strtotime($value['last_action'])) ?></span>
            </div><!--col-->
        </div><!--row-->
        <div class="clear"></div>
		<?php 
		}
		?>
    </div><!--responsive-table-->
</div><!--box-content-w100-->