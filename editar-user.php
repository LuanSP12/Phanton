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
		<title>PhantonP - Usuários</title>

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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all">
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
										<h5><a class="text-black" href="#">Gestão de Usuários</a></h5>
										<p class="mb-0">Tenha a gestão do seu <strong>BD</strong> na palma da sua mão, é possível remover e editar usuários.</p>
												<?php
			if(isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) {
			echo '<br>';
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
			}
			?>
									</div>
								</div>
							</div>
							
							<div class="col-md-6">
							<div class="card card-block">
									<h3 class="card-title">Usuários do Hotel</h3>
									<p class="card-text">Abaixo você tem a listagem de todos os usuários do seu hotel.</p>
									<table class="table table-bordered mb-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Usuário</th>
												<th>Cargo</th>
												<th>Ações</th>
											</tr>
										</thead>
										
										<tbody>
										<?php
$conecta_my = new mysqli($hostname, $usuario_cp, $senha_cp, $db_nome);
if (mysqli_connect_errno()) {
    echo "<div class=\"alert alert-warning\" role=\"alert\"><i class='fa fa-database' aria-hidden='true'></i> Não conseguimos se conectar ao host: <b>$hostname</b>, Portato não será possível visualizar os usuários.</div>";
		
}
$query = "SELECT * from users ORDER By id";

if ($result = $conecta_my->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
       
   ?>
											<tr>
												<th scope="row"><?php echo $row['id'];?></th>
												<td class=""><img src="http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $row['look'];?>&action=wav&direction=3&head_direction=3&gesture=srp&size=s"/ class="mr-2"><?php echo $row['username'];?></td>
												<td><i class="fa fa-university" aria-hidden="true"></i> <?php echo $row['rank'];?></td>
												
												<td><a href="modulos/habbo/deletar.php?user=<?php echo $row['username'];?>" class="btn btn-danger">Remover</a> <button class="btn btn-primary">Editar</button></td>
											</tr>
								
								<?php }

    /* free result set */
    $result->close();
}

/* close connection */
$conecta_my->close();
?>
</tbody>
									</table>
									
									</div>
								</div>
							
							<div class="col-md-6">
							<div class="card card-block">
							
									<h3 class="card-title">Staffs do Hotel</h3>
									<p class="card-text">Abaixo você tem a listagem de todos os staffs do seu hotel.</p>
										<table class="table table-bordered mb-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Usuário</th>
												<th>Cargo</th>
												<th>Ações</th>
											</tr>
										</thead>
										
										<tbody>
			<?php
$conecta_my = new mysqli($hostname, $usuario_cp, $senha_cp, $db_nome);
if (mysqli_connect_errno()) {
    echo "<div class=\"alert alert-warning\" role=\"alert\"><i class='fa fa-database' aria-hidden='true'></i> Não conseguimos se conectar ao host: <b>$hostname</b>, Portato não será possível visualizar os usuários.</div>";
		
}
$query = "SELECT * from users WHERE rank > 10 ORDER By id";

if ($result = $conecta_my->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
       
   ?>
   										<tr>
												<th scope="row"><?php echo $row['id'];?></th>
												<td class=""><img src="http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $row['look'];?>&action=wav&direction=3&head_direction=3&gesture=srp&size=s"/ class="mr-2"><?php echo $row['username'];?></td>
												<td><i class="fa fa-university" aria-hidden="true"></i> <?php echo $row['rank'];?></td>
												
												<td><a href="modulos/habbo/deletar.php?user=<?php echo $row['username'];?>" class="btn btn-danger">Remover</a> <button class="btn btn-primary">Editar</button></td>
											</tr>
								
								<?php }

    /* free result set */
    $result->close();
}

/* close connection */
$conecta_my->close();
?>
</tbody>
									</table>
									
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