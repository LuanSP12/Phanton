<?php

/* 	@ PhantonP - Virtus Project 
	@ Todos os direitos reservados
	@ LuanSP / FurySG / Bonivaes
	@ Serviço feito para Twizer - 2018
*/

session_start();
require_once("core/global.php");
require_once("classes/Conexao.class.php");
require_once("classes/Usuario.class.php");
require_once("classes/CPanel.class.php");
require_once("classes/FtpClient/FtpClient.php");
require_once("classes/FtpClient/FtpException.php");
require_once("classes/FtpClient/FtpWrapper.php");

if(!isset($_SESSION['email']) && (!isset($_SESSION['email']))){
	
	header("Location: index.php");
	
}else {
	
	$usuario = new Usuario();
	$ftp = new \FtpClient\FtpClient();
	$cpanel = new cpanelAPI($usuario->DadosCpanel_2($_SESSION['email'], 'logincp'), $usuario->DadosCpanel_2($_SESSION['email'], 'senhacp'), '54.39.45.89');
	require_once("classes/UsuarioCPanel.php");
	
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jun 2018 01:17:42 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>PhantonP - Principal</title>

		<!-- assets/vendor CSS -->

		<link rel="stylesheet" href="assets/vendor/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/vendor/animate.assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/vendor/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="assets/vendor/waves/waves.min.css">
		<link rel="stylesheet" href="assets/vendor/chartist/chartist.min.css">
		<link rel="stylesheet" href="assets/vendor/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="assets/vendor/morris/morris.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css">
		<script type="text/javascript" src="shp/js/ajax.js"></script>
		<link rel="stylesheet" href="assets/css/core.css">
		
	</head>
	<body class="fixed-sidebar fixed-header skin-1 content-appear">
		<div class="wrapper">

			<!-- Preloader -->
			<div class="preloader"></div>

			<!-- Sidebar -->
			<div class="site-overlay"></div>
			<div class="site-sidebar">
				<div class="custom-scroll custom-scroll-dark">
				
					<ul class="sidebar-menu">

					<?php require_once("core/menu.php");?>

			<div class="site-content">
			
				<!-- Content -->
				<div class="content-area py-1">
				
					<div class="container-fluid">
					<div class="alert alert-warning-fill alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
										</button>
										<strong>Atenção</strong> O projeto ainda está em <a href="#" class="alert-link">Desenvolvimento</a>
									</div>
						<div class="row row-md mb-1">
							<div class="col-md-4">
								<div class="box bg-white user-1">
									<div class="u-img img-cover" style="background-image: url(https://habboemotion.com/resources/images/banksy_pack/backgrounds/sky_bgs/bg_pattern_space.gif);"></div>
									<div class="u-content">
										<div class="avatar box-64">
											<img class="b-a-radius-circle shadow-white" src="https://martinsb2b-webclient.tm2digital.com/img/icon-atendente.png" alt="">
											<i class="status bg-success bottom right"></i>
										</div>
										<h5><a class="text-black" href="#">Olá, <?php echo $usuario->DadosUsuario('nome');?></a></h5>
										<p class="text-muted pb-0-5">O Status do seu servidor no momento é:</p>
										<div class="text-xs-center pb-0-5">
										
											<?php 
											if($usuario->DadosUsuario_2('status') == 'online'){
												echo '<button type="button" class="btn btn-success btn-rounded w-min-sm mb-0-25 waves-effect waves-light">Ligado</button>';
											}else {
												echo '<button type="button" class="btn btn-danger btn-rounded w-min-sm mb-0-25 waves-effect waves-light">Desligado</button>';
											}?>
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="box bg-white post post-1">
									<div class="p-img img-cover" style="background-image: url(http://www.mjsspot.com/wp-content/uploads/2018/05/Hosting-6.jpg);">
										<div class="p-info clearfix">
											<div class="float-xs-left">
												<span class="small text-uppercase">DNS</span>
											</div>
											<div class="float-xs-right">
												<span class="mr-1"><i class="fa fa-key"></i>Dados</span>
											</div>
										</div>
									</div>
									<div class="p-content">
										<h5><a class="text-black" href="#">Gerenciamento DNS</a></h5>
										<p class="mb-0">Tenha o gerenciamento do seu domínio nas suas mãos, de forma fácil e eficaz sem saber nada de WHOIS!</p>
									</div>
								</div>
							</div>
			<div class="col-sm-4 col-xs-12">
								<div class="card">
									<div class="card-header">
										Informações (DNS)
									</div>
									<div class="card-block">
										<blockquote class="card-blockquote">
										<h5>Status do Domínio</h5>
						<?php 
						$dns = $cpanel->api2->DnsLookup->name2ip([
						'domain'      => $usuario->DadosCpanel_2($_SESSION['email'], 'dominio'),
						]);
		
						/* Encode do retorno e variaveis em vetores */
						$dns = json_encode($dns);
						$dns = json_decode($dns, true);
						
						if($dns['cpanelresult']['data'][0]['status'] == 1){
						$status = $dns['cpanelresult']['data'][0]['statusmsg'];
						if($status == 'Resolved'){
							echo 'Status: '.$usuario->DadosCpanel_2($_SESSION['email'], 'dominio').' (Padrão) <span class="tag tag-success">Apontado</span><br>';
							echo 'Ip: <span class="tag tag-info">'.$dns['cpanelresult']['data'][0]['ip'].'</span><BR>';
							echo 'DNS1 (Slave) <span class="tag tag-primary">'.$dnshost['slave'].'</span><BR>';
							echo 'DNS2 (Master) <span class="tag tag-primary">'.$dnshost['master'].'</span>';
						}else {
							
							echo 'O dominio '.$usuario->DadosCpanel_2($_SESSION['email'], 'dominio').' não esta apontado';
							
						}
						}else {
							
							echo '<div class="alert alert danger">Não conseguimos executar a Query na API</div>';
							
						}
						?>
						<hr>
						<h5>Domínios da Conta</h5>
						<?php $dns = $cpanel->api2->DomainLookup->getbasedomains([
						]);
						$dns = json_encode($dns);
						$dns = json_decode($dns, true);
						if($dns['cpanelresult']['event']['result'] == 1){
						echo $dns['cpanelresult']['data'][0]['domain'].'<br>';
						}else {
							echo 'Você não tem domínios';
						}
						?>
						<hr>
						<h5>Domínio Principal</h5>
						<?php
						$usuario->DadosCpanel_2($_SESSION['email'], 'dominio').' (Padrão)';
						$dns = $cpanel->api2->DomainLookup->getmaindomain([
						]);
		
						/* Encode do retorno e variaveis em vetores */
						$dns = json_encode($dns);
						$dns = json_decode($dns, true);
						if($dns['cpanelresult']['event']['result'] == 1){
							
						echo $dns['cpanelresult']['data'][0]['main_domain'].'<br>';
						
						}else {
							
							echo 'Você não tem um domínio principal';
							
						}
						
						?>
										</blockquote>
									</div>
								</div>
							</div>
							
							<div class="col-sm-4 col-xs-12">
							<?php
								
								if(isset($_POST['btn-dominio'])){
									
								$dominio = preg_replace("/[^a-zA-Z0-9\.\-]/", "", $_POST['dominio']);
								$park = $cpanel->api2->Park->park(['domain'     => $dominio]);
										
										$park = json_encode($park);
										$park = json_decode($park, true);
								
									if($park['cpanelresult']['data'][0]['result'] == 0){
										echo '<div class="alert alert-warning">'.$park['cpanelresult']['data'][0]['reason'].'</div>';
									}else {
										
										echo '<div class="alert alert-warning">'.$park['cpanelresult']['data'][0]['reason'].'</div>';
										
									}
									

									
								}
								
								?>
								<div class="card">
							
									<div class="card-header">
										Novo Dominio
									</div>
									<div class="card-block">
									<form method="POST">
									<div class="form-group">
									<label for="exampleInputEmail1">Endereço do Domínio</label>
									<input type="text" class="form-control" name="dominio" placeholder="Habbo.com.br">
									<small class="form-text text-muted">Insira seu dominio completo sem [http://,WWWW,HTTPS://] .</small>
								</div>
								
								<div class="form-group">
								<button type="submit" name="btn-dominio" class="btn btn-primary btn-rounded w-min-sm mb-0-25 waves-effect waves-light"><i class="fa fa-world"></i> Estacionar</button>
								</form>
									</div>
									</div>
								</div>
							</div>
							
						</div>
					
					
				<!-- Footer -->
				<footer class="footer">
					<div class="container-fluid">
						<div class="row text-xs-center">
							<div class="col-sm-4 text-sm-left mb-0-5 mb-sm-0">
								2018 © PhantonC
							</div>
							<div class="col-sm-8 text-sm-right">
								<ul class="nav nav-inline l-h-2">
									<li class="nav-item"><a class="nav-link text-black" href="#">Privacy</a></li>
									<li class="nav-item"><a class="nav-link text-black" href="#">Terms</a></li>
									<li class="nav-item"><a class="nav-link text-black" href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
				</footer>
			</div>

		</div>

		<!-- assets/vendor JS -->
		<script type="text/javascript" src="assets/vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="assets/vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="assets/vendor/bootstrap4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="assets/vendor/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="assets/vendor/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="assets/vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="assets/vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
		<script type="text/javascript" src="assets/vendor/waves/waves.min.js"></script>
		<script type="text/javascript" src="assets/vendor/chartist/chartist.min.js"></script>
		<script type="text/javascript" src="assets/vendor/switchery/dist/switchery.min.js"></script>
		<script type="text/javascript" src="assets/vendor/flot/jquery.flot.min.js"></script>
		<script type="text/javascript" src="assets/vendor/flot/jquery.flot.resize.min.js"></script>
		<script type="text/javascript" src="assets/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
		<script type="text/javascript" src="assets/vendor/CurvedLines/curvedLines.js"></script>
		<script type="text/javascript" src="assets/vendor/TinyColor/tinycolor.js"></script>
		<script type="text/javascript" src="assets/vendor/sparkline/jquery.sparkline.min.js"></script>
		<script type="text/javascript" src="assets/vendor/raphael/raphael.min.js"></script>
		<script type="text/javascript" src="assets/vendor/morris/morris.min.js"></script>
		<script type="text/javascript" src="assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
		<script type="text/javascript" src="assets/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
		

		<!-- Neptune JS -->
		<script type="text/javascript" src="assets/js/app.js"></script>
		<script type="text/javascript" src="assets/js/demo.js"></script>
		<script type="text/javascript" src="assets/js/index2.js"></script>
	</body>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jun 2018 01:17:46 GMT -->
</html>