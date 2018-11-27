<?php

	require_once("../../core/global.php");
	
	try{
	$pdo = new PDO('mysql:host='.$config['host'].';dbname='.$config['data'], $config['root'], $config['senha']);
		
		}catch(PDOException $e){
			
			echo utf8_encode('<div class="alert alert-danger alert-dismissible fade in mb-1" role="alert">Erro: '.$e->getMessage().'</div>');
			exit;
			
		}
		
	if($_GET['id']){
		
		$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
		
		$stmt = $pdo->query("SELECT * FROM emuladores WHERE id='$id'");
		
		if($stmt->rowCount() > 0 ){
			
		$stmt = $pdo->query("DELETE FROM emuladores WHERE id='$id'");
		
		header("Location: ../../sistema/");
			
		}
		else {
			
			header("Location: ../../sistema/");
			
		}
		
		
		
		
	}