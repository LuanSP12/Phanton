<?php

	class Instalar{
		
		public function Painel($hostname, $root, $senha, $database, $remoto, $licenca, $ip_cpanel, $usuario_cpanel, $senha_cpanel){
			
			
	$hostname = filter_var($hostname, FILTER_SANITIZE_STRING);
	$root = filter_var($root, FILTER_SANITIZE_STRING);
	$senha = filter_var($senha, FILTER_SANITIZE_STRING);
	$remoto = filter_var($remoto, FILTER_SANITIZE_STRING);
	$licenca = filter_var($licenca, FILTER_SANITIZE_STRING);
	$database = filter_var($database, FILTER_SANITIZE_STRING);	
	$ip_cpanel = filter_var($ip_cpanel, FILTER_SANITIZE_STRING);
	$usuario_cpanel = filter_var($usuario_cpanel, FILTER_SANITIZE_STRING);
	$senha_cpanel = filter_var($senha_cpanel, FILTER_SANITIZE_STRING);
	$licenca= filter_var($licenca, FILTER_SANITIZE_STRING);
	
	
	$nomearquivo = "global.php";
	$conteudo = '<?php

	/* PhantonP Todos os direitos reservados! */
	/* Desenvolvedor: LuanSP / FurySg => Luan Schons Griebler */
	/* Sua licença de ativação: /*
	/* Mantenha os créditos, caso contrário sua licença poderá ser cancelada */
	
	date_default_timezone_set("America/Sao_Paulo");

	## Variaveis Conexão ##
	global $config;
	$config = array();
	$config["host"] = "localhost";
	$config["root"] = "'.$root.'";
	$config["senha"] = "'.$senha.'";
	$config["data"] = "'.$database.'";
	$config["site"] = "";
	$config["ip_remoto"] = "'.$remoto.'";

	## Variaveis CPanel ##
	$whm["ip"] = "'.$ip_cpanel.'";
	$whm["usuario"] = "'.$usuario_cpanel.'";
	$whm["senha"] = "'.$senha_cpanel.'";;

	/* Não troque as opções de desenvolvedor */

	$desenvolvedor = "LuanSP";

	/* Licença de autorização */
	$licensa = "'.$licenca.'";;




?>
	';
 
$fp = fopen("./core/".$nomearquivo, "w");
$escreve = fwrite($fp, "$conteudo");
fclose($fp);
rmdir('./instalador.php');
return true;
	}
}
		