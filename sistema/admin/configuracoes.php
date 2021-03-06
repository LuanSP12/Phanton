<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION['status'] != 'LOGADO_ADMIN') {
	
	header("Location: index.php");
}else {
	
	require_once("core/global.php");
    require_once("../../core/gerar_senha.php");
	require_once("../../core/cpanel.php");
}
?>
	
<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jun 2018 01:17:42 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>PhantonP - Configuracoes de Conta</title>

		<!-- ../../vendor CSS -->
		<link rel="stylesheet" href="../../vendor/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../../vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../vendor/animate.css/animate.min.css">
		<link rel="stylesheet" href="../../vendor/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="../../vendor/waves/waves.min.css">
		<link rel="stylesheet" href="../../vendor/chartist/chartist.min.css">
		<link rel="stylesheet" href="../../vendor/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="../../vendor/morris/morris.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link rel="stylesheet" href="../../vendor/jvectormap/jquery-jvectormap-2.0.3.css">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="../../css/core.css">

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
			
							<div class="col-md-6">
								<div class="box bg-white post post-4">
									<div class="p-img img-cover" style="background-image: url(https://i.pinimg.com/originals/33/15/9f/33159f054272fd3280ca22f616d99a35.jpg);"></div>
									<div class="p-content">
										
																				<h5><a class="text-black" href="#">Precisa de uma nova senha?</a></h5>
										<p class="mb-0-5">O Painel contém um gerador de senhas seguro para você utilizar!</p>
										<br>
										<p class="mb-0-5">Lembre-se se anote esta senha em algum lugar para conseguir se logar mais tarde.</p>
										<form method="POST" name="gerarsenha">
											<input type="text" class="form-control mb-1" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php if(isset($_POST["gerar"]) == true) {echo generatePassword();}?>" disabled>
										
										<button type="submit" name="gerar" class="btn btn-primary">Nova Senha</a>
										</form>
									</div>
								</div>
							</div>
			<div class="col-sm-6 col-xs-12">
			<?php
if(isset($_POST['listar_config']) == true) {
	
	$email_cap = $_POST['email'];
	$nome_cap = $_POST['nome'];
	
	$_SESSION['email_cap'] = $email_cap;
	$_SESSION['nome_cap'] = $nome_cap;
	
}
if(isset($_POST["enviar"]) == true) {
	
$email_conta = strip_tags($_POST['email']);
$senha_nova = strip_tags($_POST['senha_nova']);
$banir = $_POST['banir'];
$apagar = $_POST['apagar'];


if ($apagar == "sim") {
	
		$buscasegura = $conn->prepare("SELECT * FROM habbocp WHERE id=:email");
		$buscasegura->bindParam(":email", $email_conta);
		$buscasegura->execute();
		$linha = $buscasegura->fetch(PDO::FETCH_ASSOC);
		$usercp = $linha['logincp'];
		$buscasegura = $conn->query("DELETE FROM emuladores WHERE email='$email_conta'");
		$buscasegura = $conn->query("DELETE FROM habbocp WHERE id='$email_conta'");
			
		

			unset ($_SESSION['email_cap']);
			unset ($_SESSION['senha_cap']);
			echo '<script>window.location = "meus-habbo.php";</script>';
		
	
}

else if(empty($senha_nova)) {
		
## Solicitaçaõ de dados senha atual
$buscasegura = $conn->prepare("SELECT * FROM emuladores WHERE email=:email");
$buscasegura->bindParam(":email", $email_conta);
$buscasegura->execute();
$linha = $buscasegura->fetch(PDO::FETCH_ASSOC);
$senha_at = $linha['senha'];

	$senha_nova = $senha_at;
	$buscasegura_senha = $conn->prepare("UPDATE emuladores SET senha=:senhaatual, banido=:banido WHERE email=:email");
	$buscasegura_senha->bindParam(":senhaatual", $senha_nova);
	$buscasegura_senha->bindParam(":banido", $banir);
	$buscasegura_senha->bindParam(":email", $email_conta);
	
	$buscasegura_senha->execute();
	
	echo '<div class="alert alert-success alert-dismissible fade in" role="alert"><strong>Aviso</strong> as informações desta conta foram alteradas com <a href="#" class="alert-link">sucesso</a></div>';

		
	}


	else {
	$senha_nova = md5($senha_nova);
	$buscasegura_senha = $conn->prepare("UPDATE emuladores SET senha=:senhanova, banido=:banido WHERE email=:email");
	$buscasegura_senha->bindParam(":senhanova", $senha_nova);
	$buscasegura_senha->bindParam(":banido", $banir);
	$buscasegura_senha->bindParam(":email", $email_conta);
	
	$buscasegura_senha->execute();
	
	
		echo '<div class="alert alert-success alert-dismissible fade in" role="alert"><strong>Aviso</strong> as informações desta conta foram alteradas com <a href="#" class="alert-link">sucesso</a></div>';
		
	}
}

if(isset($_POST['listar_config']) == false){
	echo '<div class="alert alert-warning alert-dismissible fade in" role="alert"><strong>Aviso</strong> você esta editando a ultima conta selecionada, se deseja editar outra clicke <a href="meus-habbo.php" class="alert-link">aqui</a></div>';
}
?>

								<div class="card">
									<h4 class="card-header">Configurações da conta</h4>
									<div class="card-block">
									<div class="form-group">
									<form method="POST">
									<label for="exampleInputEmail1">Endereço de Email</label>
									<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $_SESSION['email_cap'];?>" disabled>
									</div>
									 <input type="text" name="email" value="<?php echo $_SESSION['email_cap'];?>" hidden>
									<div class="form-group">
									<label for="exampleInputEmail1">Nome do Hotel</label>
									<input type="text" class="form-control" name="nome_hp" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $_SESSION['nome_cap'];?>" disabled>
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1">Nova Senha</label>
									<input type="password" class="form-control" name="senha_nova" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mantenha em branco para não (alterar)">
									</div>
									<div class="form-group">
									<div class="box box-block py-2  mb-1">
										<span class="arrow arrow-left"></span>
								<label class="form-check-label">
								
								<span class="tag tag-danger">Cuidado</span> Deseja banir esta conta?
									Sim <input type="RADIO" name="banir" value="sim">
									Não <input type="RADIO" name="banir" value="nao" checked>
								
								</label>
								
								<label class="form-check-label my-1">
								
								<span class="tag tag-danger">Cuidado</span> Deseja apagar esta conta?
									Sim <input type="RADIO" name="apagar" value="sim">
									Não <input type="RADIO" name="apagar" value="nao" checked>
								
								</label>
								
								</div>
									<button type="submit" name="enviar" class="btn btn-primary">Realizar alterações</button>
									</div>
							</div>
									</div>
								
						
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

		<!-- ../../vendor JS -->
		<script type="text/javascript" src="../../vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="../../vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="../../vendor/bootstrap4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="../../vendor/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="../../vendor/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="../../vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="../../vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
		<script type="text/javascript" src="../../vendor/waves/waves.min.js"></script>
		<script type="text/javascript" src="../../vendor/chartist/chartist.min.js"></script>
		<script type="text/javascript" src="../../vendor/switchery/dist/switchery.min.js"></script>
		<script type="text/javascript" src="../../vendor/flot/jquery.flot.min.js"></script>
		<script type="text/javascript" src="../../vendor/flot/jquery.flot.resize.min.js"></script>
		<script type="text/javascript" src="../../vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
		<script type="text/javascript" src="../../vendor/CurvedLines/curvedLines.js"></script>
		<script type="text/javascript" src="../../vendor/TinyColor/tinycolor.js"></script>
		<script type="text/javascript" src="../../vendor/sparkline/jquery.sparkline.min.js"></script>
		<script type="text/javascript" src="../../vendor/raphael/raphael.min.js"></script>
		<script type="text/javascript" src="../../vendor/morris/morris.min.js"></script>
		<script type="text/javascript" src="../../vendor/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
		<script type="text/javascript" src="../../vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="../../js/app.js"></script>
		<script type="text/javascript" src="../../js/demo.js"></script>
		<script type="text/javascript" src="../../js/index2.js"></script>
	</body>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jun 2018 01:17:46 GMT -->
</html>