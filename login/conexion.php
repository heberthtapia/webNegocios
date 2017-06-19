<?php
	$root = 'root';
	$password = 'mysql';
	$host = 'localhost';
	$dbname = 'negocios';


	/*$root = 'n260m_13805882';
	$password = 'd4rkm1nd';
	$host = 'sql305.260mb.net';
	$dbname = 'n260m_13805882_negocios';*/
	$parametros = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
	try
	{
		$connection = new PDO("mysql:host=$host;dbname=$dbname;", $root, $password, $parametros);
	}
	catch(PDOException $e)
	{
		echo $e -> getMessage();
	}
?>
