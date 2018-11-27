<!DOCTYPE html>
<html lang="en">
	<?php	
	session_start();
	error_reporting(0);
if ($_SESSION['status'] != 'LOGADO') {
	
	header("Location: index.php");
}else {
	
	require_once("core/global.php");
	require_once("modulos/xml/xmlapi.php");
	require_once("core/cpanel.php");
	
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
		<title>PhantonP - Bancos</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/animate.css/animate.min.css">
		<link rel="stylesheet" href="vendor/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="vendor/waves/waves.min.css">
		<link rel="stylesheet" href="vendor/chartist/chartist.min.css">
		<link rel="stylesheet" href="vendor/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="vendor/morris/morris.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link rel="stylesheet" href="vendor/jvectormap/jquery-jvectormap-2.0.3.css">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">

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
										<h5 class="mb-1"><a class="text-white" href="#">Banco de Dados</a></h5>
									
									</div>
										<div class="p-info clearfix">
										
											<div class="float-xs-left">
												<span class="small text-uppercase">CPanel:</span>
											</div>
											<div class="float-xs-right">
												<span class="mr-1"><i class="fa fa-cog"></i>MySQLi</span>
											</div>
										</div>
									</div>
									<div class="p-content">
										<h5><a class="text-black" href="#">Gestão de Banco de Dados</a></h5>
										<p class="mb-0">Tenha a gestão do seu <strong>BD</strong> na palma da sua mão, é possível remover e adicionar BDS!.</p>
									</div>
								</div>
							</div>
							
							<div class="col-md-6">
							<div class="card card-block">
									<h3 class="card-title">Meus Bancos</h3>
									<p class="card-text">Abaixo você tem as listagens dos seus bancos de dados (BD)</p>
<?php
$xmlapi = new xmlapi($hostname);
$xmlapi->password_auth($user_whm, $senha_whm);
$xmlapi->set_debug(1);
$args = array('MysqlFE' => 'listdbs');
$result = $xmlapi->api2_query($usuario_cp, 'MysqlFE', 'listdbs');
$database = $result->data->db;
$dbusado = $result->data->size;
if ($database == null) {
	echo '<div class="alert alert-warning"><Strong>Atenção!</Strong> Você não tem um banco de dados criado!</div>';
}
?>
									<table class="table table-bordered mb-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Banco</th>
												<th>Tamanho</th>
												<th>Ações</th>
											</tr>
										</thead>
										<tr>
												<th scope="row">1</th>
												<td><?php echo $database;?></td>
												<td><?php $dbusado_formatado = round($dbusado / 1024 / 1024,2) . 'MB';
													echo $dbusado_formatado;?></td>
												<td><code>Principal</code></td>
											</tr>
										
										<tbody>
											<tr>
												<th scope="row">2</th>
												<td><?php $database = $result->data[1]->db; 
												    echo $database;?></td>
												<td><?php $dbusado = $result->data[1]->size;
												    $dbusado_formatado = round($dbusado / 1024 / 1024,2) . 'MB';
													echo $dbusado_formatado?></td>
												<td>Remover</td>
											</tr>
									</tbody>
									</table>
									
									</div>
								</div>
							
							<div class="col-md-6">
							<div class="card card-block">
							
									<h3 class="card-title">Adicionar Banco</h3>
									<p class="card-text">Adicione um novo banco ao seu servidor<p>
			<?php
			if(isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
			}
			?>
									<form method="POST" action="core/adicionar-db.php">
									<div class="input-group">
                            <span class="input-group-addon">
                               <?php echo $usuario_cp."_";?>
                            </span>
                            <input type="text" class="form-control" name="db" id="dbname" maxlength="48">
                        </div>
						
						<button type="submit" name="nova_db" class="btn btn-primary w-min-sm mb-0-25 waves-effect waves-light my-2">Adicionar</button>
						</form>
						
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

		<!-- Vendor JS -->
		<script type="text/javascript" src="vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="vendor/bootstrap4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="vendor/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="vendor/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
		<script type="text/javascript" src="vendor/waves/waves.min.js"></script>
		<script type="text/javascript" src="vendor/chartist/chartist.min.js"></script>
		<script type="text/javascript" src="vendor/switchery/dist/switchery.min.js"></script>
		<script type="text/javascript" src="vendor/flot/jquery.flot.min.js"></script>
		<script type="text/javascript" src="vendor/flot/jquery.flot.resize.min.js"></script>
		<script type="text/javascript" src="vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
		<script type="text/javascript" src="vendor/CurvedLines/curvedLines.js"></script>
		<script type="text/javascript" src="vendor/TinyColor/tinycolor.js"></script>
		<script type="text/javascript" src="vendor/sparkline/jquery.sparkline.min.js"></script>
		<script type="text/javascript" src="vendor/raphael/raphael.min.js"></script>
		<script type="text/javascript" src="vendor/morris/morris.min.js"></script>
		<script type="text/javascript" src="vendor/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
		<script type="text/javascript" src="vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="js/index2.js"></script>
	</body>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jun 2018 01:17:46 GMT -->
</html>