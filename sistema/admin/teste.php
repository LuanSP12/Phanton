<?php
session_start();
require_once("../../classes/CPanel.class.php");

					$usuario = 'habboaswmaster';
					$cPanel = new cpanelAPI($usuario, 'Luan1997@', '54.39.45.89');
					/* Adicionou o Host ao CPanel */
					$resposta = $cPanel->uapi->Mysql->add_host(['host' => '144.217.210.45']);
					
					/* Apagou a database para criar uma nova */
					$resposta = $cPanel->uapi->Mysql->delete_database(['name' => $usuario.'_habbo']);
					
					/* Criou um novo banco de dados ao cpanel */
					$resposta = $cPanel->create_database(['name' => $usuario.'_habbo']);
					
					$obj = json_encode($resposta);
					$obj = json_decode($obj);
					
					if($obj){
					if($obj->status == 1){
						
						echo 'Conseguimos instalar com sucesso o banco de dados';
						
					}else {
						
						echo 'Ocorreu um erro na instalação do banco de dados';
					}
					}else {
						
						echo 'Não conseguimos conexão ao Json da API';
						
						}
					
?>


