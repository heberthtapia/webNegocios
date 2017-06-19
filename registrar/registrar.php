<?php
include('dbcon.php');
$name = utf8_decode($_POST['firstname']);
$apellido = $_POST['lastname'];
$date = $_POST['date'];
$ci = $_POST['ci'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$pais = $_POST['pais'];
$username = $_POST['usuario'];
$estado = 1;
//echo $username;
//exit();
if ($conexion) {
		echo "conexion exitosa. <br />";
		//$username = $_POST['usuario'];
		$query = "select * from usuarios where usuario_nombre = '".$username."'";
		$results = mysql_query( $query) or die('ok');
		if(mysql_num_rows($results) > 0)
		{
			$update = "UPDATE usuarios SET nombres='".$name."',apellidos_usuario='".$apellido."',fecha_nac='".$date."',ci_usuario='".$ci."',telefono_usuario='".$phone."',ciudad_usuario='".$city."',pais_usuario='".$pais."',usuario_estado='".$estado."' WHERE usuario_nombre = '".$username."'";
			mysql_query($update);
			$resultado=mysqli_query($conexion,$update);
			if ($resultado) {
				echo "perfil almacenado. <br />";
			}
			else {
				echo "error en la ejecución de la consulta. <br />";
			}
			if (mysqli_close($con)){ 
				echo "desconexion realizada. <br />";
			} 
			else {
				echo "error en la desconexión";
			}
			header("location: mostrar.php ");
			exit ();	
			}
		else{
			echo "No se puede actualizar los datos el usuario no existe";
			}
}
?>