<!DOCTYPE html>
<html lang="en">
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
	
<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jun 2018 01:17:42 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>PhantonP - Instalar Emulador</title>

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
									<div class="p-img img-cover" style="background-image: url(http://backgroundcheckall.com/wp-content/uploads/2017/12/background-habbo.png);"></div>
									<div class="p-content">
										
										<h5><a class="text-black" href="#">Como funciona?</a></h5>
										<p class="mb-0-5">A instalação do seu Emulador envia um conjuto de arquivos atualizadas</p>
										<p class="mb-0-5">Além da instalação do emulador, também enviamos arquivos configurados de acordo com o seus dados! assim você não precisará mecher um dedo em relação a configuração do seu emulador. incrível né?</p>
									</div>
								</div>
							</div>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$diretorioRaiz = "modulos/base/Plus/Plus.zip";
	$diretorioUsuario = "emuladores/".strtolower(str_replace(" ", "", $usuario->DadosCpanel_2($_SESSION['email'], 'logincp')));
	
	if(file_exists($diretorioUsuario)){
		
	function delTree($dir) { 
   $files = array_diff(scandir($dir), array('.','..')); 
    foreach ($files as $file) { 
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
    } 
    return rmdir($dir); 
	
  } 
  
  if(delTree($diretorioUsuario)){
	  
	  echo '<div class="col-md-6"><div class="alert alert-warning">Existia algo, e tudo foi apagado! reinstale novamente para fazer uma reinstalação limpa</div></div>';
	  
  } else {
	  
	  echo '<div class="col-md-6"><div class="alert alert-danger">Não conseguimos realizar a reinstalação do emulador certifique-se de ter autorização 0777 sobre a pasta.</div></div>';
	  
  }


	
	}else {
		
	mkdir($diretorioUsuario, 0777);
	copy($diretorioRaiz, $diretorioUsuario."/Plus.zip");
	
	$zip = new ZipArchive;
	$res = $zip->open($diretorioRaiz);
	if ($res === TRUE) {
	$zip->extractTo($diretorioUsuario);
	$zip->close();
	} else {
	echo '<div class="col-md-6"><div class="alert alert-danger">Ocorreu uma falha na extração do emulador, contate o administrador</div></div>';
	
	}
	$nomearquivo = $diretorioUsuario."/config.ini";
	echo '<div class="col-md-6"><div class="alert alert-success">Conseguimos reinstalar com sucesso o seu emulador</div></div>';
	$conteudo = "
	#################################################
	ARQUIVO DE CONFIGURAÇÃO GERADO PELO PHANTON.INI
	#################################################
	
## MySQL Configuration
db.hostname=".$usuario->DadosCpanel_2($_SESSION['email'], 'dominio')."
db.port=3306
db.username=".$usuario->DadosCpanel_2($_SESSION['email'], 'logincp')."
db.password=".$usuario->DadosCpanel_2($_SESSION['email'], 'senhacp')."
db.name=".$usuario->DadosCpanel_2($_SESSION['email'], 'db_nome')."

## MySQL pooling setup (controls amount of connections)
db.pool.minsize=10
db.pool.maxsize=250


## Game TCP/IP Configuration
game.tcp.bindip=".$config['ip_remoto']."
game.tcp.port=".$usuario->DadosUsuario_2('tcp')."
game.tcp.conlimit=100000
game.tcp.conperip=2000
game.tcp.enablenagles=true

## MUS TCP/IP Configuration
mus.tcp.bindip=".$config['ip_remoto']."
mus.tcp.port=".$usuario->DadosUsuario_2('mus')."
mus.tcp.allowedaddr=".$config['ip_remoto'].";".$config['ip_remoto']."

# Camera configuration

camera.path.preview=preview/{1}-{0}.png
camera.path.purchased=purchased/{1}-{0}.png
camera.preview.maxcache=1000

## Client configuration
client.ping.enabled=1
client.ping.interval=20000
client.maxrequests=300

## Nombre & Licencia del hotel

#Aparece en la ventana
hotel.name=Oficial
#Aparece en el about
hotel.link=Hirbo

#FastFood
base.url=http://".$config['ip_remoto']."/swf/games/
fastfood.server=".$config['ip_remoto']."";
 
$fp = fopen("$nomearquivo", "w");
$escreve = fwrite($fp, "$conteudo");
fclose($fp);
	}
}
?>

								<div class="col-md-3">
								<div class="box bg-white product product-2">
									<a class="p-img img-cover" style="background-image: url(http://habboemotion.com/resources/images/topstory/topStory_earthDay.gif);" href="#">
										<div class="p-status bg-success">EMU</div>
									</a>
									<div class="p-content">
										<h5><a class="text-black" href="#">Emulador</a></h5>
										<div class="p-info">Plus Emulador edição Twizer</div>
										<div class="p-price">
										</div>
										<form method="Post">
										<button type="submit" name="iniciarPlus" class="btn btn-success btn-rounded" onclick="NProgress.start();" >Iniciar Instalação</button>
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