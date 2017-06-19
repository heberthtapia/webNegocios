<?php
include('dbcon.php');
$username = $_POST['username'];
$cuenta = $_POST['cuenta'];
$banco = $_POST['banco'];
/*echo $username;
exit();*/
if ($conexion) {
		//echo "conexion exitosa. <br />";
		$query = "SELECT * FROM tbl_users WHERE user_name = '".$username."'";
		$results = mysql_query( $query) or die('ok');
		if(mysql_num_rows($results) > 0)
		{
			$update = "UPDATE tbl_users SET banco_user='".$banco."',numero_cuenta='".$cuenta."' WHERE user_name = '".$username."'";
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
			header("location: index.php ");
			exit ();	
			}
		else{
			echo "No se puede actualizar los datos el usuario no existe";
			}
}
?>