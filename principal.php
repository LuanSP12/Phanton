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
if(!isset($_SESSION['email']) && (!isset($_SESSION['email']))){
	
	header("Location: index.php");
	
}else {
	
	$usuario = new Usuario();
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
									<div class="p-img img-cover" style="background-image: url(https://images.habbo.com/web_images/habbo-web-articles/lpromo_gen15_42.png);">
										<span class="tag tag-danger">CMS PhantonC</span>
										<div class="p-info clearfix">
											<div class="float-xs-left">
												<span class="small text-uppercase">11/06/2018</span>
											</div>
											<div class="float-xs-right">
												<span class="mr-1"><i class="fa fa-heart"></i>LuanSP</span>
											</div>
										</div>
									</div>
									<div class="p-content">
										<h5><a class="text-black" href="#">Phanton Panel</a></h5>
										<p class="mb-0">Um projeto da Virtus, Para você ter sua empresa e vender seus produtos com qualidade e segurança da Virtus!</p>
									</div>
								</div>
							</div>
			<div class="col-sm-4 col-xs-12">
								<div class="card">
									<div class="card-header">
										Informações (Emulador)
									</div>
									<div class="card-block">
										<blockquote class="card-blockquote">
											<p>Porta TCP: <?php echo $usuario->DadosUsuario('tcp');?></p>
											<p>Porta MUS: <?php echo $usuario->DadosUsuario('mus');?></p>
											<p>Porta SOCKET: <?php echo $usuario->DadosUsuario('socket');?></p>
											<p>Versão: <?php echo $usuario->DadosUsuario('versao');?></p>
											<p>Diretório: <code><?php echo $usuario->DadosUsuario('pasta');?></code></p>
										</blockquote>
									</div>
								</div>
							</div>
							
							<div class="col-sm-4 col-xs-12">
								<div class="card">
									<div class="card-header">
										Informações (CPanel)
									</div>
									<div class="card-block">
										<blockquote class="card-blockquote">
											<p>Login: 
											<button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#mostrarlogin" aria-expanded="false" aria-controls="collapseExample">
										Mostrar
									</button>
									<div class="collapse" id="mostrarlogin">
										<div class="box box-block py-2 text-xs-center mb-1">
										<span class="arrow arrow-top left"></span>
											O seu login de acesso ao CPanel é: <br>(<b><?php echo $usuario->DadosCpanel($_SESSION['email'], 'logincp');?></b>)
										</div>
									</div>
										</p>
											<p>Senha: 
									<button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#mostrarsenha" aria-expanded="false" aria-controls="collapseExample">
										Mostrar
									</button>
									<div class="collapse" id="mostrarsenha">
										<div class="box box-block py-2 text-xs-center mb-1">
										<span class="arrow arrow-top left"></span>
											A sua senha de acesso ao CPanel é: <br>(<b><?php echo $usuario->DadosCpanel($_SESSION['email'], 'senhacp');?></b>)
										</div>
									</div>
	
											</p>
											<p>Database (Nome): <?php echo $usuario->DadosCpanel($_SESSION['email'], 'db_nome');?></p>
											<p>Database (Porta): <?php echo $usuario->DadosCpanel($_SESSION['email'], 'db_porta');?></p>
											<p>Domínio: <code><?php echo $usuario->DadosCpanel($_SESSION['email'], 'dominio');?></code> </blockquote>
									</div>
								</div>
							</div>
							
						</div>
						<div class="row row-md">
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-danger mb-2">
									<div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content">
										<h1 class="mb-1">0</h1>
										<h6 class="text-uppercase">Mobis Comprados</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-success mb-2">
									<div class="t-icon right"><i class="ti-bar-chart"></i></div>
									<div class="t-content">
										<h1 class="mb-1">0</h1>
										<h6 class="text-uppercase">Usuários Cadastrados</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-primary mb-2">
									<div class="t-icon right"><i class="ti-package"></i></div>
									<div class="t-content">
										<h1 class="mb-1">0</h1>
										<h6 class="text-uppercase">Quartos Carregados</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-warning mb-2">
									<div class="t-icon right"><i class="ti-receipt"></i></div>
									<div class="t-content">
										<h1 class="mb-1">0</h1>
										<h6 class="text-uppercase">Conectados</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-md">
							<div class="col-md-6">
								<div class="box box-block bg-white">
									<div class="clearfix mb-1">
										<h5 class="float-xs-left">Notificações</h5>
										
										<div class='float-md-right'>
													<a class='btn btn-danger btn-sm' href='#'><i class='ti-trash mr-0-5'></i>Limpar</a>
												</div>
										
									</div>
	
		
									<div class="management mb-1">
										<div class="m-item">
											<div class="mi-checkbox">
										
											</div>
											<?php if($usuario->UsuarioLog($_SESSION['email'])){
												
												echo '<hr>Ótimo, Temos logs para te mostrar, Lembre-se qualquer anormalidade contate o suporte.';
												
											}else {
												
												echo 'Não encontramos logs em sua conta!';
												
											}?>
											</div>
										</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card">
									<div class="card-block b-b clearfix">
										<h5 class="float-xs-left">Equipe do Hotel</h5>
									
									</div>
									<div class="items-list">
										<div class="il-item">
											<a class="text-black" href="#">
												<div class="media">
													<div class="media-left">
														<div class="avatar box-48">
															<img class="b-a-radius-circle" src="assets/img/avatars/1.jpg" alt="">
															<i class="status bg-success bottom right"></i>
														</div>
													</div>
													<div class="media-body">
														<h6 class="media-heading">LuanSP12</h6>
														<span class="text-muted">Fundador</span>
													</div>
												</div>
												<div class="il-icon"><i class="fa fa-angle-right"></i></div>
											</a>
										</div>
										<div class="il-item">
											<a class="text-black" href="#">
												<div class="media">
													<div class="media-left">
														<div class="avatar box-48">
															<img class="b-a-radius-circle" src="assets/img/avatars/2.jpg" alt="">
															<i class="status bg-danger bottom right"></i>
														</div>
													</div>
													<div class="media-body">
														<h6 class="media-heading">LuanSP13</h6>
														<span class="text-muted">Gerente</span>
													</div>
												</div>
												<div class="il-icon"><i class="fa fa-angle-right"></i></div>
											</a>
										</div>
									
									</div>
									<div class="card-block">
										<button type="submit" class="btn btn-primary btn-block">Gerenciar Usuários</button>
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