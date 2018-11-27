<?php

	class Habbo extends Conexao{
		
		public function NovoHabbo($usuario, $dominio, $senha, $email, $nome, $senha_conta){
			
			$nome = addslashes(filter_var($nome, FILTER_SANITIZE_STRING));
			$usuario = addslashes(filter_var($usuario, FILTER_SANITIZE_STRING));
			$email = addslashes(filter_var($email, FILTER_SANITIZE_EMAIL));
			$senha = addslashes(filter_var($senha, FILTER_SANITIZE_STRING));
			$senha_conta = addslashes(filter_var($senha_conta, FILTER_SANITIZE_STRING));
			$dominio = addslashes(filter_var($dominio, FILTER_SANITIZE_URL));
			
			if(empty($nome)){global $erro;$erro = "<div class='alert alert-danger'>O nome não foi preenchido</div>"; return false;}
			else if(empty($usuario)){global $erro;$erro = "<div class='alert alert-danger'>O usuário não foi preenchido</div>";return false;}
			else if(empty($email)){global $erro;$erro = "<div class='alert alert-danger'>O email não foi preenchido</div>";return false;}
			else if(empty($senha)){global $erro;$erro = "<div class='alert alert-danger'>A senha não foi preenchido</div>";}
			else if(empty($senha_conta)){global $erro;$erro = "<div class='alert alert-danger'>A senha não foi preenchido</div>";return false;}
			else if(empty($dominio)){global $erro;$erro = "<div class='alert alert-danger'>O Dominio não foi preenchido</div>";return false;}
			
			else if(!empty($nome) && (!empty($usuario)) && (!empty($email)) && (!empty($senha)) && (!empty($senha_conta)) && (!empty($dominio))){
				
			$stmt = $this->pdo->query("SELECT * FROM emuladores WHERE email='$email'");
			if($stmt->rowCount() > 0){
				
				global $erro;
				$erro = "<div class='alert alert-warning'>Já existe uma conta com o email $email</div>";
			
			}else {
				/* Inserção de dados */
				
				$database = $usuario."_db";
			
				$stmt = $this->pdo->query("INSERT INTO habbocp (id, logincp, senhacp, db_nome, db_porta, dominio, dono) VALUES ('$email', '$nome', '$senha', '$database', '3306', '$dominio', 'admin')");

				$senha_contamd5 = md5($senha_conta);
				
				$stmt = $this->pdo->query("INSERT INTO emuladores (email, senha, nome, dono, tcp, mus, socket, versao, pasta, status, instalado) VALUES ('$email', '$senha_contamd5', '$nome', 'admin', '1', '1', '1', 'Plus', '$usuario', '1', '1')");
		
					
				
				global $erro;
				$erro = "<div class='alert alert-warning'>O seu hotel foi criado com sucesso: $email</div>";
				
				echo '
								<div class="card text-xs-center">
									<div class="card-header">
										<ul class="nav nav-tabs card-header-tabs float-xs-left">
											<li class="nav-item">
												<a class="nav-link active" href="#">Log</a>
											</li>
										</ul>
									</div>
									<div class="card-block">
										<h4 class="card-title">Muito bem!</h4>
										<p class="card-text">Abaixo segue as informações do seu usuário!</p>
										<p class="card-text">'.	
										"Usuario CPanel: ".$usuario.'<br/>'.
										"Senha CPanel: ".$senha.'<br/>'.
										"Domínio: ".$dominio.'<br/>'.
										"Email: ".$email.'<br/>'.
										"Nome: ".$nome.'<br/>'.
										"Senha Conta: ".$senha_conta.'<br/>'.
										'</p>
									</div>
								</div>
							';
							global $status_erro;$status_erro = 1;
			}
			}
			
			else {
				global $status_erro;$status_erro = 0;
				global $erro;$erro = "<div class='alert alert-danger'>O Formulário não foi preenchido.</div>";
				
			}
			
		
		}
		
	public function TotalHabbos($dono){
		
		$dono = filter_var($dono, FILTER_SANITIZE_STRING);
		
		$stmt = $this->pdo->query("SELECT * FROM emuladores WHERE dono = '$dono'");
		
		$contar = $stmt->rowCount();
		
		return $contar;
		
		
		
	}
	
	public function ListarHabbos(){
		
		$stmt = $this->pdo->query("SELECT * FROM emuladores");
		
		if($stmt->rowCount() > 0){
			
			$data = array();
			$data = $stmt->fetchAll();
			
			foreach($data as $dado){
				echo '<div class="col-md-4">';
				echo '<div class="box box-block bg-white">';
				echo '<div class="row row-sm">';
				echo '<div class="col-md-4 col-sm-4 text-center">';
				echo '<img class="img-fluid b-a-radius-circle" src="http://www.pocketgamer.fr/images/news/2014/04/habbohotel_logo.png" alt="">';
				echo '</div>';
				echo '<div class="col-md-8 col-sm-8">';
				echo "<h5>".$dado['nome']."</h5>";
				echo "<p>Dono: ".$dado['dono']."</p>";
				if($dado['status'] == 'offline'){
					
				echo "<button type='button' class='btn btn-danger mb-0-25 waves-effect waves-light' blocked><i class='typcn typcn-media-record'></i>Desligado</button>";
				
				}else {
					
				echo "<button type='button' class='btn btn-success mb-0-25 waves-effect waves-light' blocked><i class='typcn typcn-media-record'></i>Ligado</button>";
				
				}
				echo '</div></div></div>';
				echo '
				<div class="card">
									<div class="card-header">
										Realizar ações no <b>'.$dado['nome'].'</b>
									</div>
									<div class="card-block">
										<a href= "../../modulos/habbo/apagar.php?id='.$dado['id'].'" name="btn-apagar" class="btn btn-danger btn-rounded w-min-sm mb-0-25 waves-effect waves-light">Apagar</a>
										<button type="button" class="btn btn-warning btn-rounded w-min-sm mb-0-25 waves-effect waves-light">Suspender</button>
										<button type="button" class="btn btn-primary btn-rounded w-min-sm mb-0-25 waves-effect waves-light">Reiniciar</button>
								
									</div>
								</div>';
				echo '</div>';
				
	
				
			}
			return true;
			
		}else {
			
			echo "<div class='alert alert-warning'><b>Aviso</b> Não foram encontrados resultados</div>";
			
		}
		
	}
	
	public function ApagarHabbo($id){
		
		$id = FILTER_VAR($id, FILTER_SANITIZE_STRING);
		
		$stmt =  $this->pdo->query("SELECT * FROM emuladores WHERE id='$id'");
		
		if($stmt->rowCount() > 0){
			
			$stmt =  $this->pdo->prepare("DELETE FROM emuladores WHERE email='$id'");
			
			if($stmt->execute()){
				
				$stmt =  $this->pdo->query("DELETE FROM habbocp WHERE id='$id'");
				echo '<div class="alert alert-success">Aviso! O emulador foi apagado com sucesso</div>';
				
				
			}else {
				
				echo '<div class="alert alert-danger">Aviso! Ocorreu um problema ao apagar o emulador</div>';
				
			}
				
			}
			
		}
		
		
	}
		