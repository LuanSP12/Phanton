<?php
session_start();
require_once("../../core/global.php");
require_once("../../classes/Conexao.class.php");
require_once("../../classes/Admin.class.php");
require_once("../../classes/Habbo.class.php");
if(!isset($_SESSION['login']) && (!isset($_SESSION['senha']))){
	
	header("Location: index.php");
	
}else {
	
	$usuario = new Admin();
	$Habbo = new Habbo();
	
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

		<!-- vendor/ CSS -->
		<link rel="stylesheet" href="../../assets/vendor/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../assets/vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../../assets/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../assets/vendor/animate.css/animate.min.css">
		<link rel="stylesheet" href="../../assets/vendor/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="../../assets/vendor/waves/waves.min.css">
		<link rel="stylesheet" href="../../assets/vendor/chartist/chartist.min.css">
		<link rel="stylesheet" href="../../assets/vendor/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="../../assets/vendor/morris/morris.css">
		<link rel="stylesheet" href="https:/use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link rel="stylesheet" href="../../assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="../../assets/css/core.css">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:/ -->
		<!--[if lt IE 9]>
		<script src="https:/oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https:/oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
						<div class="row row-md mb-1">
							<div class="col-md-4">
								<div class="box bg-white user-1">
									<div class="u-img img-cover" style="background-image: url(../../assets/img/backadm.png);"></div>
									<div class="u-content">
										<div class="avatar box-64">
											<img/ class="b-a-radius-circle shadow-white" src="https:/martinsb2b-webclient.tm2digital.com/img/icon-atendente.png" alt="">
											<i class="status bg-success bottom right"></i>
										</div>
										<h5><a class="text-black" href="#">Olá, <?php echo $usuario->DadosUsuario('login');?></a></h5>
										<p class="text-muted pb-0-5">Seja Bem-Vindo (a) Ao PhantonP</p>
										<div class="text-xs-center pb-0-5">
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="box bg-white post post-1">
									<div class="p-img img-cover" style="background-image: url(https://images.habbo.com/web_images/habbo-web-articles/lpromo_gen15_42.png);">
										<span class="tag tag-danger">Revenda</span>
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
										<h5><a class="text-black" href="#">Área de Gerenciamento</a></h5>
										<p class="mb-0">Aqui você poderá efetuar o gerenciamento da sua revenda, e dos seus clientes! <a class="text-primary" href="#"><span class="underline">Ler Mais</span></a></p>
									</div>
								</div>
								</div>
						
						
							<div class="col-lg-3 col-md-3 col-xs-12">
							
								<div class="box box-block bg-white">
									<h5 class="mb-2">Informações</h5>
									<p class="mb-0-5">Limite Habbos<span class="float-xs-right">25%</span></p>
									<progress class="progress progress-success progress-sm" value="25" max="100">100%</progress>
									<p class="mb-0-5">Limite Revendas <span class="float-xs-right">75%</span></p>
									<progress class="progress progress-danger progress-sm" value="75" max="100">100%</progress>
								
									
						
							
						</div>
						</div>
						<div class="row row-md">
							<div class="col-lg-2 col-md-1 col-sm-1 col-xs-12">
								<div class="box box-block tile tile-2 bg-danger mb-2">
									<div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content">
										<h1 class="mb-1">0</h1>
										<h6 class="text-uppercase">Habbos Onlines</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<div class="box box-block tile tile-2 bg-success mb-2">
									<div class="t-icon right"><i class="ti-bar-chart"></i></div>
									<div class="t-content">
										<h1 class="mb-1"><?php echo $Habbo->TotalHabbos($_SESSION['login']);?></h1>
										<h6 class="text-uppercase">Habbos Criados</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<div class="box box-block tile tile-2 bg-primary mb-2">
									<div class="t-icon right"><i class="ti-package"></i></div>
									<div class="t-content">
										<h1 class="mb-1">0</h1>
										<h6 class="text-uppercase">Habbos Banidos</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<div class="box box-block tile tile-2 bg-warning mb-2">
									<div class="t-icon right"><i class="ti-receipt"></i></div>
									<div class="t-content">
										<h1 class="mb-1">0</h1>
										<h6 class="text-uppercase">Revendas</h6>
									</div>
								</div>
							</div>
						</div>
					
					
				<!-- Footer -->
				<footer class="footer">
					<div class="container-fluid">
						<div class="row text-xs-center">
							<div class="col-sm-4 text-sm-left mb-0-5 mb-sm-0">
								2018 © PhantonP - Virtus Project
							</div>
							<div class="col-sm-8 text-sm-right">
								<ul class="nav nav-inline l-h-2">
									<li class="nav-item"><a class="nav-link text-black" href="#">Privacidade</a></li>
									<li class="nav-item"><a class="nav-link text-black" href="#">Termos</a></li>
									<li class="nav-item"><a class="nav-link text-black" href="#">Ajuda</a></li>
								</ul>
							</div>
						</div>
					</div>
				</footer>
			</div>

		</div>

		<!-- vendor/ JS -->
		<script type="text/javascript" src="../../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/bootstrap4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="../../assets/vendor/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="../../assets/vendor/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="../../assets/vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/waves/waves.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/chartist/chartist.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/switchery/dist/switchery.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/flot/jquery.flot.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/flot/jquery.flot.resize.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/CurvedLines/curvedLines.js"></script>
		<script type="text/javascript" src="../../assets/vendor/TinyColor/tinycolor.js"></script>
		<script type="text/javascript" src="../../assets/vendor/sparkline/jquery.sparkline.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/raphael/raphael.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/morris/morris.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="../../assets/js/app.js"></script>
		<script type="text/javascript" src="../../assets/js/demo.js"></script>
		<script type="text/javascript" src="../../assets/js/index2.js"></script>
	</body>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jun 2018 01:17:46 GMT -->
</html>