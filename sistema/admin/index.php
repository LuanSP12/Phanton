<!DOCTYPE html>
<html lang="en">
<?php	

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
require_once("../../core/global.php");
require_once("../../classes/Conexao.class.php");
require_once("../../classes/Admin.class.php");
$usuario = new Admin();
if(isset($_SESSION['login']) && (isset($_SESSION['senha']))){
	
	header("Location: /sistema/admin/principal.php");
	
}
?>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jun 2018 01:21:35 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>PhantonP - Login</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="../../assets/vendor/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../assets/vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../../assets/vendor/font-awesome/css/font-awesome.min.css">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="../../assets/css/core.css">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="img-cover" style="background-image: url(http://www.bluekiteweb.com/wp-content/uploads/2016/03/clouds-bg-final3.png);">
		<div class="container-fluid">
			<div class="sign-form">
				<div class="row">
					<div class="col-md-4 offset-md-4 px-3">
							<?php

			 if(isset($_POST['btn-login'])){
				$login = $_POST['login'];
				$senha = md5($_POST['senha']);
				$log = "Acessou a sua conta";
				if($usuario->Logar($login, $senha, $log)){
					
					
					$usuario->redirecionar("/sistema/admin/principal.php");
					
					
				}
				else{
				$error = "Verifique seus dados!";
				} 
			 }
			 if(isset($error))
            {
                  ?>
                 <div class="alert alert-danger fade in radius-bordered alert-shadowed">
                                            <button class="close" data-dismiss="alert">
                                                ×
                                            </button>
                                            <i class="fa-fw fa fa-times"></i>
                                            <strong>Erro</strong> <?php echo $error;?>
                                        </div>
			<?php } ?>
						<div class="box b-a-0">
							<div class="p-2 text-xs-center">
								<h5>Iniciar Sessão</h5>
							</div>
							<form class="form-material mb-1" method="POST" name="login">
								<div class="form-group">
									<input type="text" class="form-control" name="login" placeholder="Usuário">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="senha" placeholder="Senha">
								</div>
								<div class="px-2 form-group mb-0">
									<button type="submit" name="btn-login" class="btn btn-primary btn-block text-uppercase">Entrar</button>
								</div>
							</form>
							<div class="px-2">
								<div class="row">
					
									</div>
				
							</div>
							<div class="p-2 text-xs-center text-muted">
								Esqueceu a Senha? <a class="text-black" href="#"><span class="underline">Recuperar</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="../../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="../../assets/vendor/bootstrap4/js/bootstrap.min.js"></script>
	</body>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jun 2018 01:21:35 GMT -->
</html>