<!DOCTYPE html>
<?php
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
	require_once("classes/UsuarioCPanel.php");
	
}

?>
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
		<title>PhantonP - Reinstalar CMS</title>

		<!-- Vendor CSS -->
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
		

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
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
			
							<div class="col-md-12">
								<div class="box bg-white post post-1">
									<div class="p-img img-cover" style="background-image: url(https://lh6.googleusercontent.com/proxy/l05UUZKNkW5_ToxlR8ijSVlf6JlxtRYx5KnAzsFA8nya0zBg0Ogu0SryuLAIhuOXcVJrHudyqkx7BHlJFRHTOPpvRgQIXPsP_KrVilw1u6pARqUypq5rDsSmrDyg=s0-d);">
									<div class="p-content">
									
										<span class="tag tag-white"></span>
										<h5 class="mb-1"><a class="text-white" href="#">Módulo de Preparo CMS</a></h5>
									
									</div>
										<div class="p-info clearfix">
										
											<div class="float-xs-left">
												<span class="small text-uppercase">Módulo de Instalação:</span>
											</div>
											<div class="float-xs-right">
												<span class="mr-1"><i class="fa fa-cog"></i>Content Management System</span>
											</div>
										</div>
									</div>
									<div class="p-content">
										<h5><a class="text-black" href="#">Como funciona a reinstalação da minha CMS?</a></h5>
										<p class="mb-0">O PhantonP  remove <strong>TODOS</strong> os arquivos encontrados no diretório público do CPanel (Public_HTML) este diretório contém todos os arquivos do seu CMS, Se você realizou alterações é necessário realizar o BACKUP destes arquivos! Após concordar com a instalação de uma nova CMS todos estes arquivos serão perdidos e sua CMS voltara a ser a padrão sem modificações.</p>
																
									</div>
								</div>
								
							</div>
						

	

			<div class="col-md-3">
			
<?php

if(isset($_POST['btn-cms'])){
	
$ftp = new \FtpClient\FtpClient();
$ftp->connect('ftp.'.$usuario->DadosCpanel_2($_SESSION['email'], 'dominio'));
$ftp->login($usuario->DadosCpanel_2($_SESSION['email'], 'logincp'), $usuario->DadosCpanel_2($_SESSION['email'], 'senhacp'));

if($ftp->putAll('modulos/cms/Plus/', '/public_html/', FTP_BINARY)){
	
	echo '<div class="alert alert-success">CMS Reinstalada & configurada com sucesso</div>';
}else {
	
	echo '<div class="alert alert-success">Ocorreu um erro na reinstalação da CMS</div>';
	
	
}
}

?>

			<form method="POST">
								<div class="box bg-white product product-2">
									<a class="p-img img-cover" style="background-image: url(http://habboemotion.com/resources/images/topstory/topStory_earthDay.gif);" href="#">
										<div class="p-status bg-success">CMS</div>
									</a>
									<div class="p-content">
										<h5><a class="text-black" href="#">UfoCMS</a></h5>
										<div class="p-info">Bonita, Segura e estável</div>
										<div class="p-price">
										</div>
										<button type="submit" class="btn btn-success btn-rounded" name="btn-cms">Iniciar Instalação</button>
									</div>
								</div>
							</div>
							</form>
						</div>
						
						</div>
					
				<!-- Footer -->
				<footer class="footer">
					<div class="container-fluid">
						<div class="row text-xs-center">
							<div class="col-sm-4 text-sm-left mb-0-5 mb-sm-0">
								2018 © PhantonP
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

		<!-- Vendor JS -->
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