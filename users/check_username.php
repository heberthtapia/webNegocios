<?php
sleep(1);
include('dbcon.php');
if($_REQUEST)
{
	$username 	= $_REQUEST['username'];
	$query = "select * from tbl_users where user_name = '".strtolower($username)."'";
	$results = mysql_query( $query) or die('ok');
	
	if(mysql_num_rows(@$results) > 0) // not available
	{
		/*
		$afiliado=$_REQUEST['username'];
		*/
		echo '<div id="Error">El nombre de Usuario ya existe</div>';
	}
	else
	{
		echo '<div id="Success">Nombre se usuario disponible</div>';
	}
	
}?>