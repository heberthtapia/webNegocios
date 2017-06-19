<?php
/*error_reporting(E_ALL ^ E_NOTICE);*/
include('dbcon.php');
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
if ($conexion) {
		//echo "conexion exitosa. <br />";
		$insert = "INSERT INTO usuarios (usuario_nombre,usuario_clave,usuario_email) VALUES ('$username','$password','$email')";
		mysql_query($insert);
		/*$resultado=mysqli_query($conexion,$insert);
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
		}*/
		//header("location: full_register.php ");
		$query = "select * from usuarios where usuario_nombre = '".strtolower($username)."'";
		$results = mysql_query( $query) or die('ok');
		?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>NEGOCIOSAIG</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
<link href="../css/font-awesome.css" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
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
	<div class="banner-top">
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					<li>
						<div class="w3layouts-banner-top jarallax">
							<div class="agileinfo-dot">
								<div class="container">
									<div class="agileits-banner-info">
									</div>	
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- banner -->
	<div class="banner">
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">MENU</span>
						<span class="icon-bar"></span>
					  </button>
						<div class="w3layouts-logo">
							<img src="../images/logo.jpeg" alt="" />
						</div>
					</div>
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<!--<nav>
							<ul class="nav navbar-nav">
								<li><a href="../index.html">INICIO</a></li>
								<li><a href="#" class="scroll">Quienes Somos</a></li>
								<li><a href="#" class="scroll">Opciones de Negocio</a></li>
								<li><a href="#" class="scroll">Servicios</a></li>
								<li><a href="#">Registrate</a></li>
                                <li><a href="#" class="scroll">Contactos</a></li>
							</ul>
						</nav>-->
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //banner -->
<div class="container">
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
        <input type="hidden" name="usuario" id="usuario" value="<?php echo $username;?>" >
        <div class="form-group" align="center"> 
        <input type="submit" value="Registrar.." class="btn btn-primary btn-large">
        </div>
        </fieldset>
        </form>
        </div>
     </div>
</div>
	<footer>
		<div class="container">
			<div class="copyright">
				<p>© 2017 NEGOCIOSAIG. All rights reserved | Design by <a href="www.testpage.260mb.net">Ignacio Lopez S.</a></p>
			</div>
		</div>
	</footer>
</body>
</html>		
		
		
		
		
		
		
		
<?		
exit ();	

}
?>