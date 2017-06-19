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
$estado = 0;
//echo $username;
//exit();
if ($conexion) {
			$insert = "INSERT INTO usuarios (nombres,apellidos_usuario,fecha_nac,ci_usuario,telefono_usuario,user_name,ciudad_usuario,pais_usuario,usuario_estado) VALUES ('".$name."','".$apellido."','".$date."','".$ci."','".$phone."','".$username."','".$city."','".$pais."','".$estado."')";
			mysql_query($insert);
			//mysql_query($update);
			$resultado=mysqli_query($conexion,$insert);
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
		else{
			echo "No se puede actualizar los datos el usuario no existe";
			}
//}
?>