<?php
session_start();
require_once("../../core/global.php");
require_once("../../classes/Conexao.class.php");
require_once("../../classes/Admin.class.php");
require_once("../../classes/CPanel.class.php");
require_once("../../classes/Habbo.class.php");
if(!isset($_SESSION['login']) && (!isset($_SESSION['senha']))){
	
	header("Location: index.php");
	
}else {
	
	$usuario = new Admin();
	$modulo = new Habbo();
	
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
		<title>PhantonP - Novo Habbo</title>

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
									<div class="u-img img-cover" style="background-image: url(http://habboloji.com/wp-content/uploads/2017/10/kapak-234-720x340.gif);"></div>
									<div class="u-content">
										<div class="avatar box-64">
											<img class="b-a-radius-circle shadow-white" src="https:/martinsb2b-webclient.tm2digital.com/img/icon-atendente.png" alt="">
											<i class="status bg-success bottom right"></i>
										</div>							
										<h5><a class="text-black" href="#">Olá, <?php echo $usuario->DadosUsuario('login');?></a></h5>
										<p class="text-muted pb-0-5">Você esta criando um servidor habbo<br>Todos habbos criados pela conta de Admin obterão o marcador de <code>Admin</code> no seu campo de dono.</p>
										<div class="text-xs-center pb-0-5">
											
										</div>
									</div>
								</div>
							</div>

			
							<div class="col-md-8">
								<div class="box bg-white post post-4">
									<div class="p-img img-cover" style="background-image: url(https://images.habbo.com/web_images/habbo-web-articles/fansite_habbid.png);"></div>
									<div class="p-content">
										
																				<h5><a class="text-black" href="#">Precisa de uma nova senha?</a></h5>
										<p class="mb-0-5">O Painel contém um gerador de senhas seguro para você utilizar!</p>
										<br>
										<p class="mb-0-5">Lembre-se se anote esta senha em algum lugar para conseguir se logar mais tarde.</p>
										<form method="POST" name="gerarsenha">
											<input type="text" class="form-control mb-1" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php if(isset($_POST["gerar"]) == true) {echo generatePassword();}?>" disabled>
										
										<button type="submit" name="gerar" value='gerar' class="btn btn-primary">Nova Senha</a>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-8">
		<?php
		
		 if(isset($_POST['btn-criar'])){
			 
			 $usuario = $_POST['loginhabbo'];
			 $dominio = $_POST['dominio_cp'];
			 $senha = $_POST['senha_cp'];
			 $email = $_POST['email'];
			 $nome = $_POST['nome'];
			 $senha_conta = $_POST['senha'];
			 if($cPanel = new cpanelAPI($usuario, $senha, '54.39.45.89')){
				 
				if($cPanel->uapi->Mysql->get_server_information()){
					
					if($modulo->NovoHabbo($usuario, $dominio, $senha, $email, $nome, $senha_conta)){
						
					
					echo $erro;
					
					}else {
						
					echo $erro;
						
					}
					global $status_erro;
					if($status_erro == 1){
					/* Adicionou o Host ao CPanel */
					$resposta = $cPanel->uapi->Mysql->add_host(['host' => '144.217.210.45']);
					
					/* Apagou a database para criar uma nova */
					$resposta = $cPanel->uapi->Mysql->delete_database(['name' => $usuario.'_habbo']);
					
					/* Criou um novo banco de dados ao cpanel */
					$resposta = $cPanel->create_database(['name' => $usuario.'_habbo']);
					
					$obj = json_encode($resposta);
					$obj = json_decode($obj);
					
					if($obj->status == 1){
						
						echo '<div class="alert alert-success">Sucesso! Instalamos o banco de dados</div>';
					}
						else {
							
						echo '<div class="alert alert-danger">Erro! Tivemos algum problema com o banco de dados</div>';
					
					}
					
				}
				}else {
					
					echo '<div class="alert alert-danger">Não conseguimos efetuar uma conexão ao CPanel, contate um <b>Administrador</b></div>';
					
				}
				 
			 }else {
				 
				echo '<div class="alert alert-danger">A API Não foi encontrada.</div>';
				
			 }
			 
			 
			 
			 
		 }
		
		?>
								<div class="card">
									<h4 class="card-header">Dados CPanel</h4>
									<div class="card-block">
									<form method="POST">
									<div class="form-group">
									
									<label for="exampleInputEmail1">Usuário CPanel)</label>
									<input type="text" name="loginhabbo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" >
									</div>
									<div class="form-group">
									
									<label for="exampleInputEmail1">Dominio CPanel (Domínio para o site)</label>
									<input type="text" name="dominio_cp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" >
									</div>
									
									<div class="form-group">
									
									<label for="exampleInputEmail1">Senha CPanel (Utilize o gerador para uma senha segura)</label>
									<input type="password" name="senha_cp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" >
									</div>
									
									</div>
									</div>
									
								<div class="card">
									<h4 class="card-header">Dados Emulador</h4>
									<div class="card-block">
									<div class="form-group">
									<label for="exampleInputEmail1">Endereço de Email</label>
									<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" >
									</div>
									
									<div class="form-group">
			
									<label for="exampleInputEmail1">Nome do Hotel</label>
									<input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" >
									</div>
									
									<div class="form-group">
									<label for="exampleInputEmail1">Senha conta</label>
									<input type="password" name="senha" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" >
									</div>
								
			
										<button type="submit" name="btn-criar" class="btn btn-primary">Salvar Alterações</button>
										</form>
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