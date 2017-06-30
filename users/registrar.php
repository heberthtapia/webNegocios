<?php
session_start();
include('dbcon.php');
$name = utf8_decode($_POST['firstname']);
$apellido = $_POST['lastname'];
$date = $_POST['date'];
$ci = $_POST['ci'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$pais = $_POST['pais'];
$username = $_POST['usuario'];
$estado = 0;
//echo $username;
//exit();
if ($conexion) {
		/*echo "conexion exitosa. <br />";
		$query = "select * from tbl_users where user_name = '".$username."'";
		$results = mysql_query( $query) or die('ok');
		if(mysql_num_rows($results) > 0)
		{*/
			$insert = "INSERT INTO usuarios (nombres,apellidos_usuario,fecha_nac,ci_usuario,telefono_usuario,iduser,ciudad_usuario,pais_usuario,usuario_estado) VALUES ('$name','$apellido','$date','$ci','$phone','$username','$city','$pais','$estado')";

			$resultado mysql_query($insert);
			//$resultado=mysqli_query($conexion,$insert);
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
				header("location: ../login/index.php ");
				exit ();
}
//}
?>
