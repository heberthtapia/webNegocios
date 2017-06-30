<!DOCTYPE HTML>
<html lang="es">
<head>
  <title>NEGOCIOSAIG</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/styleboot.css" rel="stylesheet" type="text/css"  media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css"  media="all" />
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,800,600,400' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
<script src="js/responsive-nav.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#username').blur(function(){
		$('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);
		var username = $(this).val();
		var dataString = 'username='+username;
		$.ajax({
			type: "POST",
			url: "check_username.php",
			data: dataString,
			success: function(data) {
				$('#Info').fadeIn(1000).html(data);
				//alert(data);
			}
		});
	});

	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#customForm").validate({
			rules: {
				username: {
					required: true,
					minlength: 3
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
			},
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			messages: {
				username: {
					required: "Por favor ingrese su nombre de usuario",
					minlength: "El nombre de usuario tiene como minimo 3 caracteres"
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
			}
		});
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
						 <li class="active"><a href="#">REGISTRATE</a></li>
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
<?php
	include('dbcon.php');
	$idUser	= $_GET['nombre'];
	$query	= "select * from tbl_users where user_id = '".strtolower($idUser)."'";
	$results = mysql_query( $query) or die('ok');
	$arreglo = mysql_fetch_row($results);
	/*if(mysql_num_rows(@$results) > 0)
	{
		//echo $username;
	}*/
?>
<form action="registra_afiliado.php" name="customForm" id="customForm" method="post" role="form" >
			 <div class="form-header">
				  <h3 class="form-title texthead"  align="center"><i class="fa fa-user bigicon"></i>&nbsp;&nbsp;Bienvenido nuevo usuario... Registrese!!!</h3>
			 </div>
			<div class="form-group">
				<label for="username"  class="col-lg-2 control-label bigicon">Nombre de usuario</label>
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-user texthead"></span></div>
						<input id="username" name="username" type="text" class="form-control" value="" placeholder="Ingrese el nombre de usuario" pattern="[A-Za-z0-9_-]{1,15}"/>
					<div id="Info"></div>
				</div>
				<span class="help-block" id="error"></span>
			</div>
			<div class="form-group">
				<label for="password"  class="col-lg-2 control-label bigicon">Contraseña</label>
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-lock texthead"></span></div>
					<input id="password" class="form-control" name="password" type="password" value="" placeholder="************" />
				</div>
			</div>
			<div class="form-group">
				<label for="confirm_password"  class="col-lg-2 control-label bigicon">Confirme su contraseña</label>
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-lock texthead"></span></div>
					<input id="confirm_password" name="confirm_password" class="form-control" type="password" placeholder="************">
				</div>
				<span class="help-block" id="error"></span>
			</div>
			<div class="form-group">
				<label for="email"  class="col-lg-2 control-label bigicon">Email</label>
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-envelope texthead"></span></div>
					<input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu email">
				</div>
				<span class="help-block" id="error"></span>
			  </div>
			<input type="hidden" name="afiliador" id="afiliador" value="<?=$arreglo[0];?>" >
			<div class="g-recaptcha" data-sitekey="6LcKFCIUAAAAAA6FRieKX0S_hRZAV4JDZxjp6oDf" align="center"></div><br />
			<div align="center">
				<button type="submit" class="btn btn-primary btn-large"><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Registrarse...</button>
			</div>
	<br clear="all" />
</form>
			</div>
			</div>
		  </div>
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

