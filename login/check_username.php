<?php
session_start();

sleep(1);
include('dbcon.php');
if($_REQUEST)
{
	$number	= $_REQUEST['number'];
	$query = "SELECT * FROM cuenta WHERE user_id = '".$_SESSION['user_session']."' ORDER BY id_cuenta ASC";
	$results = mysql_query( $query) or die('ok');

	while ( $fila = mysql_fetch_array($results) ) {
		$saldo = trim($fila['saldo']);
	}

	$rest = $saldo - $number;
	
	if(mysql_num_rows(@$results) > 0 && $rest >= 100) // not available
	{		
		echo '<div id="Success">Correcto...!!!</div>';
	}
	else
	{
		echo '<div id="Error">No puede retirar ese monto</div>';
	}
	
}?>