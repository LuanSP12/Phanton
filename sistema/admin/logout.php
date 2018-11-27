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
						
							<div class="col-md-12">
								<div class="box bg-white post post-1">
									<div class="p-img img-cover" style="background-image: url(https://images.habbo.com/web_images/habbo-web-articles/lpromo_gen15_42.png);">
										
										<div class="p-info clearfix">
											<div class="float-xs-left">
											<h5>Sair do painel, <?php echo $usuario->DadosUsuario('login');?></h5>
											</div>
											<div class="float-xs-right">
												
											</div>
										</div>
									</div>
									<div class="p-content">
										
										<p class="mb-0">Clickando no botão de logout você encerra sua atividade na sua conta do PhantonP, você tem certeza que deseja sair do painel? </span></p>
									</div>
									<div class="card-footer">
										<div class="clearfix">
											<div class="float-xs-left">
											</div>
											<div class="float-xs-right">
											<?php
											
											if(!isset($_POST['btn-logout'])){
												
												$token = md5(session_id());
												$usuario->Logout($token);
												
											}
											
											
											
											?>
											<form method="POST">
											
												<button type="submit" name="btn-logout" class="btn btn-success btn-rounded">Sair do Painel</button>
												</form>
											</div>
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