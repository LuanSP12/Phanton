<?php

/* 	@ PhantonP - Virtus Project 
	@ Todos os direitos reservados
	@ LuanSP / FurySG / Bonivaes
	@ Serviço feito para Twizer - 2018
*/
	
	date_default_timezone_set("America/Sao_Paulo");

	## Variaveis Conexão ##
	global $config;
	$config = array();
	$config["host"] = "localhost";
	$config["root"] = "root";
	$config["senha"] = "";
	$config["data"] = "data";
	$config["site"] = "";
	$config["ip_remoto"] = "localhost";

	## Variaveis CPanel ##
	$whm["ip"] = "aswmaster.com";
	$whm["usuario"] = "root";
	$whm["senha"] = "dHStwsEj96&P";
	
	## CONFIGURAÇÃO DNS ##

	$dnshost = array();
	$dnshost['slave'] = 'ns1.aswmaster.com';
	$dnshost['master'] = 'ns2.aswmaster.com';
	
	/* Não troque as opções de desenvolvedor */

	$desenvolvedor = "LuanSP";

	/* Licença de autorização */
	$licensa = "dsdsadsa";;




?>
	