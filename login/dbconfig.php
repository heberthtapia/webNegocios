<?php


	$db_host = "localhost";
	$db_name = "negocios";
	$db_user = "root";
	$db_pass = "mysql";

	/*$db_host = "sql305.260mb.net";
	$db_name = "n260m_13805882_negocios";
	$db_user = "n260m_13805882";
	$db_pass = "d4rkm1nd";*/

	try{

		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}


?>
