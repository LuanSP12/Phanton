<?php
session_start();
if(isset($_SESSION['status'])) {
	
	echo "1";
	session_destroy();
	header("Location: ../index.php");
	

	
}
else {
	echo "2";
	header("Location: ../index.php");
	
}


?>