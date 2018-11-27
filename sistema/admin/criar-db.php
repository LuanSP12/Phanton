<?php	require_once("../../modulos/xml/xmlapi.php");
		require_once("../../core/cpanel.php");
Include "../../modulos/xml/xmlapi.php";
$xmlapi = new xmlapi($hostname);  
$xmlapi->password_auth($logincp_novohabbo,$senhacp_novohabbo);
$xmlapi->set_port('2083');

$xmlapi->api2_query("passwd","user","pass");  

$args5 = array(       
           'passwd' => '123321lek', 'user' => 'twizerxyz', 'pass' => 'LuanSP12',
       );
?>