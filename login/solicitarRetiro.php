<?php
session_start();
include('dbcon.php');

$number = $_POST['number'];
$message = $_POST['message'];

$query = "SELECT * FROM cuenta AS c, usuarios AS u WHERE c.user_id = '".$_SESSION['user_session']."' AND c.user_id = u.user_id ORDER BY id_cuenta ASC";
$results = mysql_query( $query) or die('ok');

	while ( $fila = mysql_fetch_array($results) ) {
		$saldo = trim($fila['saldo']);
		$name = $fila['nombres'];
		$ape  = $fila['apellidos_usuario'];
	}

//echo "=>".$name."--".$ape."--".$number;

$destinatario = "ht.heberth@gmail.com"; 
$asunto = "Solicitud de retiro"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Solicitud de retiro</title> 
</head> 
<body> 
<h1>El Sr(a). '.$name.' '.$ape.'/h1> 
<p> 
<b>Solicito el retiro de su cuenta por: Bs.- '.$number.'</b>. 
</p> 
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Freddy <n4ch0.lopez@gmail.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
$headers .= "Cc: ht.heberth@gmail.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);

header("location: misaldo.php ");
		
?>
