<?php
/*error_reporting(E_ALL ^ E_NOTICE);*/
include('dbcon.php');

date_default_timezone_set("America/La_Paz" );

$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$afiliador = $_POST['afiliador'];
$date = 0;
$nivel = 0;
$rest = 350;
$cont = 0;

require_once "tree.php";
$tree = new Tree();

if ($conexion) {

		$fecha = date('Y-m-d g:i:s');

		$insert = "INSERT INTO tbl_users (user_name,user_email,user_password,usuario_afiliado,joining_date) VALUES ('$username','$email','$password','$afiliador','$fecha')";
		mysql_query($insert);

		$idUser = mysql_insert_id();

		$sql	= "INSERT INTO cuenta (user_id, userFrom, debe, haber, saldo, fecha) VALUES ('$idUser', 0,350,0,350,'$fecha')";
		mysql_query($sql);		

		if( $afiliador != 0 ){
			
			$elements = $tree->getReg($idUser);
			$masters = $elements["masters"];
			$childrens = $elements["childrens"];	
			
			$debe =((350*10)/100);

			foreach ($childrens as $key => $value) {

				$nivel++;

				if($nivel <= 6){

					$q = 'SELECT * FROM cuenta WHERE user_id = '.$value["user_id"].' ORDER BY id_cuenta ASC';
					$rs = mysql_query( $q );
					while ($fila = mysql_fetch_array($rs)) {
						$saldo = trim($fila['saldo']);
					}

					$saldo = $saldo+$debe;				
					$afiliador = $value["user_id"];				

					$sql = "INSERT INTO cuenta (user_id, userFrom, debe, haber, saldo, fecha) VALUES ('$afiliador', '$idUser','$debe',0,'$saldo','$fecha')";
					mysql_query($sql);
					
					$rest = $rest - $debe;

					$sql = "INSERT INTO cuenta (user_id, userFrom, debe, haber, saldo, fecha) VALUES ('$idUser', '$afiliador','0','$debe','$rest','$fecha')";
					mysql_query($sql);

					$rst = "SELECT nivel FROM tbl_users WHERE user_id = $afiliador";
					$regis = mysql_query($rst);

					$reg = mysql_fetch_array($regis);

					if($nivel > $reg[0]){
						$strQuery = "UPDATE tbl_users SET nivel = $nivel WHERE user_id = $afiliador";
						mysql_query($strQuery);
					}
				}	
			}			
		}		

		$query = "select * from tbl_users where user_name = '".strtolower($username)."'";
		$results = mysql_query( $query) or die('ok');

		?>
<!DOCTYPE HTML>
<html>
<head>
<title>NEGOCIOSAIG</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../css/style.css" rel="stylesheet" type="text/css"  media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,800,600,400' rel='stylesheet' type='text/css'>
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/styleboot.css" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/responsive-nav.js" type="text/javascript"></script>
<script>
	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				firstname: {
					required: true,
					 minlength: 3},
				lastname: {
					required: true,
					 minlength: 4},
				date: "required",
				ci: {
					required: true,
					minlength: 7,
					maxlength: 12,
					},
				phone: {
					required: true,
					minlength: 8,
					maxlength: 15,
				},
				username: {
					required: true,
					minlength: 5
				},
				password: {
					required: true,
					minlength: 8
				},
				confirm_password: {
					required: true,
					minlength: 8,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				city: "required",
				pais: "required",
				agree: "required"
			},
			messages: {
				firstname: "El nombre tiene 3 caracteres como minimo",
				lastname: "El apellido tiene 4 caracteres como minimo",
				date: "Por favor ingrese la fecha de nacimiento (dia/mes/año)",
				ci: {
						minlength: "La cedula de identidad tiene 7 digitos como minimo",
						maxlength: "La cedula de identidad tiene 12 digitos como maximo",
					},
				city: "Por favor ingrese la ciudad en la que reside actualmente",
				pais: "Por favor ingrese el pais de su procedencia",
				phone: {
					minlength: "El numero movil tiene como minimo 8 numeros",
					maxlength: "El numero movil tiene como maximo 12 numeros",
					},
				username: {
					required: "Por favor ingrese su nombre de usuario",
					minlength: "El nombre de usuario tiene como minimo 5 caracteres"
				},
				password: {
					required: "Por favor ingrese su contraseña",
					minlength: "La contraseña tiene como minimo 8 caracteres"
				},
				confirm_password: {
					required: "Por favor ingrese su contraseña",
					minlength: "La contraseña tiene como minimo 8 caracteres",
					equalTo: "Por favor ingrese la misma contraseña"
				},
				email: "Por favor ingrese un correo valido",
				agree: "Por favor acepte nuestras politicas",
			}
		});

		// combina el nombre y apellido para el nombre de usuario
		$("#username").focus(function() {
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			if (firstname && lastname && !this.value) {
				this.value = firstname + "." + lastname;
			}
		});

		//code to hide topic selection, disable for demo
		var newsletter = $("#newsletter");
		// newsletter topics are optional, hide at first
		var inital = newsletter.is(":checked");
		var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("red");
		var topicInputs = topics.find("input").attr("disabled", !inital);
		// show when newsletter is checked
		newsletter.click(function() {
			topics[this.checked ? "removeClass" : "addClass"]("red");
			topicInputs.attr("disabled", !this.checked);
		});
	});
</script>

</head>
<body>
	<!----start-header----->
	 <div class="header">
		 <div class="wrap">
			<div class="top-header">
				<div class="logo">
					<a href="index.html"><img src="../images/logo.jpg" height="80"></a>
				</div>
			</div>
			<!---start-top-nav---->
			<div class="top-nav">
				<div class="top-nav-left">
					 <div id="nav">
					  <ul>
						<li><a href="#">INICIO</a></li>
						<li><a href="#">QUIENES SOMOS</a></li>
						 <li><a href="#">SERVICIOS</a></li>
						 <li class="active"><a href="index.php">REGISTRATE</a></li>
						 <!--<li><a href="blog.html">Blog</a></li>
						 <li><a href="projects.html">Projects</a></li>-->
						 <li><a href="#">CONTACTO</a></li>
					 </ul>
			   </div>
			   <script>
				  var navigation = responsiveNav("#nav");
				</script>
				</div>
				<div class="top-nav-right">
					<div class="search">
					  <form>
						  <input type="text" value="" />
						  <input type="submit" value="" />
						  <div class="clear"></div>
					  </form>
				  </div>
				</div>
				<div class="clear"> </div>
			</div>
			<!---End-top-nav---->
		</div>
	</div>
   <!----End-header----->

		 <!---start-content---->
<div class="wrap">
<div class="about-desc">
<div class="content">
		<div class="signup-form-container">
	<div class="form-body">
		<form class="cmxform" id="signupForm" method="POST" action="registrar.php" role="form">
		<fieldset>
		<div class="form-header">
		  <h3 class="form-title texthead" align="center"><i class="fa fa-user bigicon"></i>&nbsp;&nbsp;Registre sus Datos Completos...</h3>
		 </div>
		 <div class="form-group">
		<label for="firstname"  class="col-lg-2 control-label bigicon">Nombres</label>
		<div class="input-group">
		<div class="input-group-addon"><span class="glyphicon glyphicon-user texthead"></span></div>
		<input id="firstname" name="firstname" type="text" class="form-control"  placeholder="Nombres">
		</div>
		<span class="help-block" id="error"></span></div>
		<div class="form-group">
		<label for="lastname"  class="col-lg-2 control-label bigicon">Apellidos</label>
		<div class="input-group">
		<div class="input-group-addon"><span class="glyphicon glyphicon-user texthead"></span></div>
		<input id="lastname" name="lastname" type="text" class="form-control"  placeholder="Apellidos"  maxlength="60">
		</div>
		<span class="help-block" id="error"></span>
		</div>
		<div class="form-group">
		<label for="date"  class="col-lg-2 control-label bigicon">fecha de Nacimiento</label>
		<div class="input-group">
		<div class="input-group-addon"><span class="glyphicon glyphicon-calendar texthead"></span></div>
		<input id="date" name="date" type="date" class="form-control">
		</div>
		<span class="help-block" id="error"></span>
		</div>
		<div class="form-group">
		<label for="ci"  class="col-lg-2 control-label bigicon">CI/DNI/ID</label>
		<div class="input-group">
		<div class="input-group-addon"><span class="glyphicon glyphicon-user texthead"></span></div>
		<input id="ci" name="ci" type="number" class="form-control"  placeholder="7654321"  maxlength="10">
		</div>
		<span class="help-block" id="error"></span>
		</div>
		 <div class="form-group">
		<label for="phone"  class="col-lg-2 control-label bigicon">Telefono movil</label>
		<div class="input-group">
		<div class="input-group-addon"><span class="glyphicon glyphicon-phone texthead"></span></div>
		<input id="phone" name="phone" class="form-control" type="number" placeholder="591-72558972"  maxlength="15">
		</div>
		<span class="help-block" id="error"></span>
		</div>
		<div class="form-group">
		<label for="city"  class="col-lg-2 control-label bigicon">Ciudad</label>
		<div class="input-group">
		<div class="input-group-addon"><span class="glyphicon glyphicon-home texthead"></span></div>
		<input id="city" name="city" class="form-control" type="city" placeholder="Donde vives actualmente"  maxlength="20">
		</div>
		<span class="help-block" id="error"></span>
		</div>
		<div class="form-group">
		<label for="pais"  class="col-lg-2 control-label bigicon">Pais</label>
		<div class="input-group">
		<div class="input-group-addon"><span class="glyphicon glyphicon-globe texthead"></span></div>
		<input id="pais" name="pais" class="form-control" type="pais" placeholder="De donde eres???"  maxlength="20">
		</div>
		<span class="help-block" id="error"></span>
		</div>
		<div class="form-group">
		<label for="agree"  class="col-lg-3 control-label bigicon">Esta de acuerdo con nuestras politicas</label>
		<input type="checkbox" class="checkbox" id="agree" class="form-control" name="agree">
		<span class="help-block" id="error"></span>
		</div>
		<input type="hidden" name="usuario" id="usuario" value="<?php echo $idUser;?>" >
		<div class="form-group" align="center">
		<input type="submit" value="Registrar.." class="btn btn-primary btn-large">
		</div>
		</fieldset>
		</form>
		</div>
	 </div>
</div><!--end content-->
</div><!--end about-desc-->
</div><!--end wrap	-->
		 <!---End-content---->
		 <!---start-footer---->
		  <div class="footer">
			<div class="wrap">
				 <div class="foot-nav">
					<ul>
						<li><a href="index.html">INICIO</a></li>
						<li><a href="about.html">QUIENES SOMOS</a></li>
						<li><a href="contact.html">CONTACTO</a></li>
					</ul>
				   </div>
				   <div class="copy-right">
					<p>2017 Copyright (c) &nbsp; &nbsp;<a href="www.negociosaig.net" target="_blank">NEGOCIOSAIG</a></p>
				</div>
			<div class="clear"> </div>
		</div>
	</div>
		 <!---End-footer---->
	</body>
</html>
<?
	exit ();
}
?>
