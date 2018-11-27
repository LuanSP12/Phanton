<?php
include "../../include/global.php";
include "../../include/logado.php";

date_default_timezone_set('America/Bahia');
// Current Date
$year	= date('Y');
$month   = date('m');
$day	 = date('d');
$hour	= date('H');
$minute  = date('i');
$second  = date('s');
$date	= array($hour,$minute,$second,$month,$day,$year);

// Data que o emulador foi Ligado
$year	= $anos;
$month   = $meses;
$day	 = $dias;
$hour	= $horas;
$minute  = $minutos;
$second  = $segundos;
$date2   = array($hour,$minute,$second,$month,$day,$year);


// Dias este retorno função de mês no ano especificado
function meses($ano) {
	$leap = date("L", mktime (0, 0, 0, 1, 1, $ano));
	// check for leap year
	$val  = ( $leap == 1 ) ? 29 : 28; // Dias fevereiro
	$rs   = array( false, 31, $val, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 );
	return $rs;
}

// Classe Definindo classe palavra-chave bt
class DateBirthCount {

	function DateBirthCountPassed(){
		global $date, $date2, $return;
		list ($hour, $minute, $second, $month, $day, $year)= $date;
		list ($hour2, $minute2, $second2, $month2, $day2, $year2)= $date2;

		$todayDate = mktime($hour, $minute, $second, $month, $day, $year);
		$BirtDate  = mktime($hour2, $minute2, $second2, $month2, $day2, $year2);
		$diff	  = $todayDate - $BirtDate;
		if($diff < 0){
		$diff = 0;
		}

		// total de anos
		$yearDiff = $year - $year2;
		if( $month < $month2 ){
			$yearDiff--;
		}
		$yl = $yearDiff;

		// Obter Meses.
		$ml  = $month - $month2;
		if( $month2 > $month ){
			$ml  = ( 12 - $month2 ) + $month;
			if( $ml > 0 && ( $day < $day2 ) ){
			$ml--;
			}
		}

		// Obter Dias.
		$dl  = $day - $day2;
		if( $day < $day2 ){
			$mm = meses( $year );
			$dl = ( $mm[intval($month)] - $day2 ) + $day;
		}

		// Obter dias, minutos e segundos.
		$dlA = floor($diff/60/60/24);
		$hl  = floor(($diff - $dlA*60*60*24)/60/60);
		$il  = floor(($diff - $dlA*60*60*24 - $hl*60*60)/60);
		$sl  = floor(($diff - $dlA*60*60*24 - $hl*60*60 - $il*60));

		// OUTPUT
		$return = array( $yl, $ml, $dl, $hl, $il, $sl);
		return ($return);
	}
}
//Fazendo novo objeto para a classe DateBirthCount
$date_obj = new DateBirthCount($date);
// Função (método) chamada por um objeto para funcionar DateBirthCountPassed
$date_obj -> DateBirthCountPassed();

// Fazendo varialbes de array $regresso
list($yl,$ml,$dl,$hl,$il,$sl) = $return;
// Output Navegador


echo "";
	echo $dl . " Dia(s), ";
	echo $hl . " Hora(s), ";
	echo $il . " Minuto(s) ";
	echo $sl . " Segundo(s) ";
?>