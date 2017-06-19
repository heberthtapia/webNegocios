<?php
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', 'mysql');
define('DB_DATABASE', 'negocios');

/*define('DB_SERVER', 'sql305.260mb.net');
define('DB_SERVER_USERNAME', 'n260m_13805882');
define('DB_SERVER_PASSWORD', 'd4rkm1nd');
define('DB_DATABASE', 'n260m_13805882_negocios');*/


$conexion = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
mysql_select_db(DB_DATABASE, $conexion);

/*$con = mysql_connect('sql305.260mb.net', 'n260m_13805882', 'd4rkm1nd');
mysql_select_db("n260m_13805882_negocios", $con);*/
?>

