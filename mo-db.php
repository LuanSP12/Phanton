<?php
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
		<title>PhantonP - Instalar DB</title>

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
			
							<div class="col-md-6">
								<div class="box bg-white post post-4">
									<div class="p-img img-cover" style="background-image: url(https://images.habbo.com/web_images/habbo-web-articles/lpromo_march18UA.png);"></div>
									<div class="p-content">
										
										<h5><a class="text-black" href="#">Como funciona?</a></h5>
										<p class="mb-0-5">A instalação do seu Banco de dados apaga todos os registros anteriores e envia um banco zerado para o seu hotel! lembre-se esta ação somente é reversivel se conter o backup.</p>
										<br>
										<p class="mb-0-5">Lembre-se se o envio falhar verifique se seus dados do CPanel são os mesmos do PhantonP.</p>
									</div>
								</div>
			
							
								<div class="card card-block">
				
									<div class="p-content">
										
										<h5><a class="text-black" href="#">Instalação do Banco</a></h5>
										<p class="mb-0-5">A instalação do seu Banco de dados utiliza a internet compartilhada do nosso painel, portanto quando você instala o seu banco você entra em uma especie de fila, o tempo normal é de até 1 minuto para uma instalação completa.</p>
										<br>
										<p class="mb-0-5">Se sua instalação for interrompida tente novamente mais tarde.</p>
									</div>
								</div>
								
						
								
								
							



<?php

if(isset($_POST['btn-re'])){
		
	##Cria CPanel
	
	/* Iniciou a conexão ao cpanel */
	$cPanel = new cpanelAPI($usuario->DadosCpanel_2($_SESSION['email'], 'logincp'), $usuario->DadosCpanel_2($_SESSION['email'], 'senhacp'), '54.39.45.89');
	/* Adicionou o Host ao CPanel */
	$response = $cPanel->uapi->Mysql->add_host(['host' => '144.217.210.45']);
	/* Apagou a database para criar uma nova */
	$response = $cPanel->uapi->Mysql->delete_database(['name' => $usuario->DadosCpanel_2($_SESSION['email'], 'logincp').'_db']);

	/* Criou um novo banco de dados ao cpanel */
	$response = $cPanel->uapi->Mysql->create_database(['name' => $usuario->DadosCpanel_2($_SESSION['email'], 'logincp').'_db']);
		
	$conn = new mysqli('54.39.45.89', $usuario->DadosCpanel_2($_SESSION['email'], 'logincp'),$usuario->DadosCpanel_2($_SESSION['email'], 'senhacp'), $usuario->DadosCpanel_2($_SESSION['email'], 'db_nome'));
	
	$filename = 'modulos/sql/Plus.sql'; 
	$op_data = '';
	$lines = file($filename);
	foreach ($lines as $line)
	{
    if (substr($line, 0, 2) == '--' || $line == '')//This IF Remove Comment Inside SQL FILE
    {
        continue;
    }
    $op_data .= $line;
    if (substr(trim($line), -1, 1) == ';')//Breack Line Upto ';' NEW QUERY
    {
        $conn->query($op_data);
        $op_data = '';
    }
	}
	echo "<div class='alert alert-warning'>Banco de dados " . $usuario->DadosCpanel_2($_SESSION['email'], 'db_nome') . " restaurado.</div>";
	
	}
?>
						
							</div>
			<div class="col-md-3">
								<div class="box bg-white product product-2">
									<a class="p-img img-cover" style="background-image: url(http://habboemotion.com/resources/images/topstory/topStory_earthDay.gif);" href="#">
										<div class="p-status bg-success">DB</div>
									</a>
									<div class="p-content">
										<h5><a class="text-black" href="#">Banco Padrão</a></h5>
										<div class="p-info">Banco focado em diversão</div>
										<div class="p-price">
										</div>
										<form method="post">
										<button type="submit" name="btn-re" class="btn btn-success btn-rounded">Iniciar Instalação</button>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="box bg-white product product-2">
									<div class="p-content">
									<h5><a class="text-black" href="#">Estatísticas</a></h5>
										<table class="table table-striped mb-md-0">
										<thead>
											<tr>
												<th>Categoria</th>
												<th>Infos</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row"><img src="http://habboo-a.akamaihd.net/c_images/catalogue/icon_2.png"/></th>
												<td><b>+2</b> Mil Custons</td>
												
											</tr>
											<tr>
												<th scope="row"><img src="http://habboo-a.akamaihd.net/c_images/catalogue/icon_6.png"/></th>
												<td><b>0</b> Iniciais</td>
												
											</tr>
											<tr>
												<th scope="row"><img src="http://habboo-a.akamaihd.net/c_images/catalogue/icon_69.png"/></th>
												<td><b>+2</b> Mil Mob Staff</td>
												
											</tr>
											<tr>
												<th scope="row"><img src="http://habboo-a.akamaihd.net/c_images/catalogue/icon_61.png"/></th>
												<td>Efeito Totem</td>
												
											</tr>
											<tr>
												<th scope="row"><img src="http://habboo-a.akamaihd.net/c_images/catalogue/icon_145.png"/></th>
												<td>Loja LTD</td>
												
											</tr>
											</tbody>
										<div class="p-price">
										</div>
									</div>
								</div>
								
							</div>

						</div>
						</div>

						</div>
						
				
						
					
			
			</div>

		</div>

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