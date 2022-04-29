<?php 
    $usersOnline = Panel::listUsersOnline();
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
				<p>3481</p>
			</div><!--box-metrics-wrapper-->
		</div><!--box-metrics-single-w33-left-->
		<div class="box-metrics-single w33 left">
			<div class="box-metrics-wrapper">
				<h2>Visitas Hoje</h2>
				<p>1897</p>
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

        <div class="row">
            <div class="col">
                <span>191.168.0.1</span>
            </div><!--col-->
            <div class="col">
                <span>20/04/2000 20:04:53</span>
            </div><!--col-->
        </div><!--row-->
        <div class="clear"></div>
    </div><!--responsive-table-->
</div><!--box-content-w100-->