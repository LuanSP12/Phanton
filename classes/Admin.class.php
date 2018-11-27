<?php
	
	class Admin extends Conexao{
		
		public function redirecionar($url){
		
		header("Location: $url");
		
		
	}
	public function Logout($token){
		
		$token = filter_var($token, FILTER_SANITIZE_STRING);
		
		if(isset($token) && $token === $token) {
			
		session_destroy();
		header("location: /index.php");
		exit();
			
			}
		}
		public function Logar($login, $senha, $log){
		
	$ip = $_SERVER["REMOTE_ADDR"];
    $hora = date("h:i:s");
    $data = date("d/m/Y");
    $registro = "$data as $hora";

	try{
			$stmt = $this->pdo->prepare("SELECT * FROM admin WHERE login=:login AND senha=:senha");
			$stmt->bindParam(":login", $login);
			$stmt->bindParam(":senha", $senha);
			$stmt->execute();
			
			if($stmt->rowCount()>0){
				
				$log = $this->pdo->query("INSERT INTO log (login, ip, horario, log) VALUES ('$login', '$ip', '$registro', '$log')");
			
				session_start();
				$_SESSION['login'] = $login;
				$_SESSION['senha'] = $senha;
				
				return true;
				
				
				
				
				
			}
			else {
				$log = $this->pdo->query("INSERT INTO log (login, ip, horario, log) VALUES ('$login', '$ip', '$registro', 'Tentou acessar a sua conta')");
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
	
	$login = $_SESSION['login'];
	$senha = $_SESSION['senha'];

	 try {
		 
            $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE login=:login AND senha=:senha");
			$stmt->bindParam(":login", $login);
			$stmt->bindParam(":senha", $senha);
			$stmt->execute();
			
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
				
			return $linha[$tabela];
			
		}

            } catch (PDOException $ex) {
            echo "Erro: {$ex->getMessage()}, consulte um Desenvolvedor";
        
		}

	
	
	
	}
		
	}