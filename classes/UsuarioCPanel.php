<?php
		/* Sistema de memória alocada CPanel By LuanSP (FurySG) 2018 */
		/* Este sistema utiliza a lógica de alocamento, sem realizar calculos */
		/* Tendo uma resposta mais rápida do servidor e segura */
		$cpanel = new cpanelAPI($usuario->DadosCpanel_2($_SESSION['email'], 'logincp'), $usuario->DadosCpanel_2($_SESSION['email'], 'senhacp'), '54.39.45.89');
		$disco = $cpanel->api2->Fileman->getdiskinfo([
		]);
		
		/* Encode do retorno e variaveis em vetores */
		$disco = json_encode($disco);
		$disco = json_decode($disco, true);
		$DiscoUtilizado = $disco['cpanelresult']['data'][0]['spaceused_humansize'];
		$DiscoMaximo = $disco['cpanelresult']['data'][0]['spacelimit_humansize'];
		
		/* Prevenção MB Maior que 100 */
		
		$DiscoUtilizado = substr($DiscoUtilizado, 0, 3);
		
		/* Prevenção MB Menor que 100 */
		
		if(strpos($DiscoUtilizado, ',')){
			$DiscoUtilizado = substr($DiscoUtilizado, 0, 2);
		}
	
		/* Display dos dados */
		$DiscoMaximo = substr($DiscoMaximo, 0, 3);
		$DiscoMaximo = str_replace(',', '',$DiscoMaximo);
		if(!empty($DiscoMaximo)){
		$DiscoMaximo = $DiscoMaximo.'00';
		}
		$BarraMemoria = "<progress class='progress progress-rounded progress-success progress-sm' value='$DiscoUtilizado' max='$DiscoMaximo'></progress>";					
		$memoria = $DiscoUtilizado. ' MB' . ' / ' . $DiscoMaximo. ' MB';			
		
