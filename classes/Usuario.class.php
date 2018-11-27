<?php

	class Usuario extends Conexao{
	
	protected $email;
	protected $senha;
	protected $url;
	protected $log;
	
	public function redirecionar($url){
		
	
		header("Location: $url");
		ob_end_flush();
		
		
	}
	public function Logar($email, $senha, $log){
		
	$ip = $_SERVER["REMOTE_ADDR"];
    $hora = date("h:i:s");
    $data = date("d/m/Y");
    $registro = "$data ás $hora";

	try{
			$stmt = $this->pdo->prepare("SELECT * FROM emuladores WHERE email=:email AND senha=:senha");
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":senha", $senha);
			$stmt->execute();
			if($stmt->rowCount()>0){
				
				$log = $this->pdo->query("INSERT INTO log (email, ip, horario, log) VALUES ('$email', '$ip', '$registro', '$log')");
			
				
			if(!isset($_SESSION)) 
				{ 
					session_start(); 
				
				} 
				
				$_SESSION['email'] = $email;
				$_SESSION['senha'] = $senha;
				
				return true;
				
				
				
				
				
			}
			else {
				$log = $this->pdo->query("INSERT INTO log (email, ip, horario, log) VALUES ('$email', '$ip', '$registro', 'Tentou acessar a sua conta')");
			return false;
			
			}
	}
	catch (PDOException $ex) {
		
            echo "Erro: {$ex->getMessage()}, consulte um administrador";
			
        return false;
		}
		
			
		
	}
	
	public function DadosUsuario($tabela){
			
	echo $this->DadosUsuario_2($tabela);
	 
	 
	}
	
	public function DadosUsuario_2($tabela){
	
	$email = $_SESSION['email'];
	$senha = $_SESSION['senha'];

	 try {
		 
            $stmt = $this->pdo->prepare("SELECT * FROM emuladores WHERE email=:email AND senha=:senha");
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":senha", $senha);
			$stmt->execute();
			
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
				
			return $linha[$tabela];
			
		}

            } catch (PDOException $ex) {
            echo "Erro: {$ex->getMessage()}, consulte um administrador";
        
		}

	
	
	
	}
	
	public function DadosCpanel($email, $tabela){
			
	echo $this->DadosCpanel_2($email, $tabela);
	 
	 
	}
  
	
	public function DadosCpanel_2($email, $tabela){
	
				
		try {
		 
            $stmt = $this->pdo->prepare("SELECT * FROM habbocp WHERE id=:email");
			$stmt->bindParam(":email", $email);
			$stmt->execute();
			
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
				
			return $linha[$tabela];
			
		}

            } catch (PDOException $ex) {
				
            echo "Erro: {$ex->getMessage()}, consulte um administrador";
        
		}
		
	}
	
	public function UsuarioLog($email){
		
		try {
		 
            $stmt = $this->pdo->prepare("SELECT * FROM log WHERE email=:email Limit 0,5");
			$stmt->bindParam(":email", $email);
			$stmt->execute();
			
			if($count = $stmt->rowCount() > 0 ){
				
				
			 while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
				 
			echo "<div class='mi-title'>";
			echo "<a class='text-black'>".$linha['ip']."</a> Log: <a class='text-black'>".$linha['log']."</a>";
			echo "</div>";
			echo "<div class='mi-text'></div>";
			echo "<div class='clearfix'>";
			echo "<div class='float-md-right'><span class='font-90 text-muted'>".$linha['horario']."</span></div></div>";
			
		}
		
			return true;
			
			}else {
				
				return false;
				
			}
			
			
			return true;

            } catch (PDOException $ex) {
            echo "Erro: {$ex->getMessage()}, consulte um administrador";
			return false;
        
		}
		
	}
	
	
	
	
	
	
}