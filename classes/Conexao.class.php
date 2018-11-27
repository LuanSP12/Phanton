<?php

Class Conexao{
	
	public function __construct(){
		
		
		
		try{
		global $config;
		$this->pdo = new PDO('mysql:host='.$config['host'].';dbname='.$config['data'], $config['root'], $config['senha']);
		
		}catch(PDOException $e){
			
			echo utf8_encode('<div class="alert alert-danger alert-dismissible fade in mb-1" role="alert">Erro: '.$e->getMessage().'</div>');
			exit;
			
		}

		
		
	}
	
	
	
	
	
}