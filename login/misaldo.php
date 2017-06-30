<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: index.php");
}
include_once 'dbconfig.php';
$stmt = $db_con->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

include('dbcon.php');

$q = "SELECT * FROM cuenta WHERE user_id = '".$row['user_id']."' ORDER BY id_cuenta ASC";
$str = mysql_query($q) or die(mysql_error());

while ( $fila = mysql_fetch_array($str) ) {
	$saldo = trim($fila['saldo']);
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>NEGOCIOSAIG</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../css/style.css" rel="stylesheet" type="text/css"  media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,800,600,400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/normalize.min.css" type="text/css">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel='stylesheet' href='http://fonts.googleapis.com/icon?family=Material+Icons' type='text/css'>
<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/sidenav.min.css" type="text/css">
<script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script>
$(document).ready(function() {

	$('#number').blur(function(){
		
		$('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);
		var number = $(this).val();
		var dataString = 'number='+number;
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
		$("#formRetiro").validate({
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
				agree: "required",
				number: {
					required: true,
					number: true
				}
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
				number: "Solo numeros"
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
});
</script>
<title>Bienvenido</title>
  <style type="text/css">
  body {
	background: #BCC9D1;
	font-family: 'Roboto', sans-serif;
  }
  .toggle {
	color: #4076A6;/*666;*/
	display: block;
	height: 72px;
	line-height: 72px;
	text-align: center;
	width: 72px;
  }
  h1 { margin:30px auto; text-align:center;}
  </style>
 
  <script src="../js/responsive-nav.js" type="text/javascript"></script>

  <style type="text/css">
	ul{
		list-style: none;
	}
	</style>
	<script>
	$(document).ready(function()
	{
		$(".btn-folder").on("click", function(e)
		{
			e.preventDefault();
			if($(this).attr("data-status") === "1")
			{
				$(this).attr("data-status", "0");
				$(this).find("span").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign")
			}
			else
			{
				$(this).attr("data-status", "1");
				$(this).find("span").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign")
			}
			$(this).next("ul").slideToggle();
		})

		$('#myModal').on('shown.bs.modal', function () {
		  
		})
	});
	</script>
 </head>
<body>
<nav class="sidenav" data-sidenav data-sidenav-toggle="#sidenav-toggle">
	<div class="sidenav-brand">
	  MENU USUARIO
	</div>
	<div class="sidenav-header">
	  <h3><a href="index.php">IR AL INICIO</a></h3>
	  <small><span class="glyphicon glyphicon-user"></span>&nbsp;Bienvenido  <?php echo $row['user_name']; ?>&nbsp;</small>
	</div>

	<ul class="sidenav-menu">
	  <li>
		<a href="javascript:;" data-sidenav-dropdown-toggle class="active">
		  <span class="sidenav-link-icon">
			<i class="material-icons">store</i>
		  </span>
		  <span class="sidenav-link-title">Mi perfil</span>
		  <span class="sidenav-dropdown-icon show" data-sidenav-dropdown-icon>
			<i class="material-icons">arrow_drop_down</i>
		  </span>
		  <span class="sidenav-dropdown-icon" data-sidenav-dropdown-icon>
			<i class="material-icons">arrow_drop_up</i>
		  </span>
		</a>

		<ul class="sidenav-dropdown" data-sidenav-dropdown>
		  <li><a href="misdatos.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<small>Mis datos</small></a></li>
		  <li><a href="misdatoscuenta.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<small>Agregar cuenta Bancaria</small></a></li>
		  <li><a href="javascript:;"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;<small>Cambiar contraseña</small></a></li>
		  <li><a href=""></a></li>
		</ul>
	  </li>
	   <li>
		<a href="mired.php">
		  <span class="sidenav-link-icon">
			<i class="material-icons">assignment_ind</i>
		  </span>
		  <span class="sidenav-link-title">Mi Red</span>
		</a>
	  </li>
	  <li>
		<a href="misaldo.php">
		  <span class="sidenav-link-icon">
			<i class="material-icons">assignment_ind</i>
		  </span>
		  <span class="sidenav-link-title">Mi Saldo</span>
		</a>
	  </li>
	  <li>
		<a href="javascript:;" data-sidenav-dropdown-toggle>
		  <span class="sidenav-link-icon">
			<i class="material-icons">Otra opcion</i>
		  </span>
		  <span class="sidenav-link-title">titulo de enlaces</span>
		  <span class="sidenav-dropdown-icon show" data-sidenav-dropdown-icon>
			<i class="material-icons">arrow_drop_down</i>
		  </span>
		  <span class="sidenav-dropdown-icon" data-sidenav-dropdown-icon>
			<i class="material-icons">arrow_drop_up</i>
		  </span>
		</a>

		<ul class="sidenav-dropdown" data-sidenav-dropdown>
		  <li><a href="javascript:;">enlace 1</a></li>
		  <li><a href="javascript:;">enlace 2</a></li>
		</ul>
	  </li>
	  <!--<li>
		<a href="javascript:;" data-sidenav-dropdown-toggle>
		  <span class="sidenav-link-icon">
			<i class="material-icons">shopping_cart</i>
		  </span>
		  <span class="sidenav-link-title">Dolore magna</span>
		  <span class="sidenav-dropdown-icon show" data-sidenav-dropdown-icon>
			<i class="material-icons">arrow_drop_down</i>
		  </span>
		  <span class="sidenav-dropdown-icon" data-sidenav-dropdown-icon>
			<i class="material-icons">arrow_drop_up</i>
		  </span>
		</a>

		<ul class="sidenav-dropdown" data-sidenav-dropdown>
		  <li><a href="javascript:;">Aliqua</a></li>
		  <li><a href="javascript:;">Exercitation</a></li>
		  <li><a href="javascript:;">Minim veniam</a></li>
		</ul>
	  </li>-->
	  <li>
		<a href="javascript:;">
		  <span class="sidenav-link-icon">
			<i class="material-icons">assignment_ind</i>
		  </span>
		  <span class="sidenav-link-title">enlace ver</span>
		</a>
	  </li>
	  <!--<li>
		<a href="javascript:;">
		  <span class="sidenav-link-icon">
			<i class="material-icons">alarm</i>
		  </span>
		  <span class="sidenav-link-title">Commodo</span>
		</a>
	  </li>-->
	</ul>

<!--    <div class="sidenav-header">
	  OTRA SECCION
	</div>-->
	<ul class="sidenav-menu">
	  <li>
		<a href="javascript:;" data-sidenav-dropdown-toggle>
		  <span class="sidenav-link-icon">
			<i class="material-icons">date_range</i>
		  </span>
		  <span class="sidenav-link-title">Titulo de enlaces</span>
		  <span class="sidenav-dropdown-icon show" data-sidenav-dropdown-icon>
			<i class="material-icons">arrow_drop_down</i>
		  </span>
		  <span class="sidenav-dropdown-icon" data-sidenav-dropdown-icon>
			<i class="material-icons">arrow_drop_up</i>
		  </span>
		</a>

		<ul class="sidenav-dropdown" data-sidenav-dropdown>
		  <li><a href="javascript:;">enlace 1</a></li>
		  <li><a href="javascript:;">enlace 2</a></li>
		</ul>
	  </li>
	  <li>
		<a href="javascript:;">
		  <span class="sidenav-link-icon">
			<i class="material-icons">backup</i>
		  </span>
		  <span class="sidenav-link-title">Otro enlace</span>
		</a>
	  </li>
	  <li>
		<a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;<small>Salir</small></a>
	  </li>
	</ul>
  </nav>
<a href="javascript:;" class="toggle" id="sidenav-toggle"><i class="material-icons">menu</i></a>
<!---start-content---->
<div class="container">
	<div class="panel-group">
		  <div class="panel panel-primary">
			<div class="panel-body"><h1>&nbsp;Bienvenido  <?php echo $row['user_name']; ?>&nbsp;</h1>
			<p align="center">Aqui podemos poner algun video de motivacion y otras cosas mas...</p></div>
		  </div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-8">
					   <div class="panel panel-success">
							<div class="panel-heading">Mi Saldo:</div>
								<div class="panel-body">

							<dl class="dl-horizontal">
							  	<dt>MI SALDO :</dt>
							  	<dd>Bs. <?=$saldo;?></dd>								
							</dl>
							<dl class="dl-horizontal">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
								Solicitar Retiro
								</button>								
							</dl>

								</div>
					   </div>
				</div>
				<div class="col-sm-4">
				  <div class="panel panel-primary">
							<div class="panel-heading">TUS DATOS PERSONALES SON:</div>
						<div class="panel-body">
							<dl class="dl-horizontal">
							  <dt>NOMBRES :</dt>
							  <dd><?php echo $row['user_name']; ?></dd>
							  <dt>CORREO :</dt>
							  <dd><?php echo $row['user_email']; ?></dd>
							  <dt>AFILIADOR :</dt>
							  <dd><b><?php echo $row['usuario_afiliado']; ?></b></dd>
							  <!--<dt>FECHA DE REGISTRO :</dt>
							  <dd><?php //echo $row['joining_date']; ?></dd>-->
							  <dt>BANCO :</dt>
							  <dd><?php echo $row['banco_user']; ?></dd>
							  <dt>NUMERO DE CUENTA :</dt>
							  <dd><?php echo $row['numero_cuenta']; ?></dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-4">
					   <div class="panel panel-info">
									  <div class="panel-heading">Mensajes y anuncios:</div>
									<div class="panel-body">
										<p>Bienvenido a tu pagina personal&nbsp;<b> <?php echo $row['user_name']; ?></b>&nbsp; aqui podras ver tus datos personales con los que te registraste en la pagina.<br>
								  Si kieres cambiar algun dato tienes que ponerte en contacto con el administrador para poder hacerlo.</p>
									</div>
					   </div>
				</div>
				<div class="col-sm-4">
					   <div class="panel panel-warning">
									  <div class="panel-heading">Mensajes y anuncios importantes:</div>
									<div class="panel-body">
										<p>Bienvenido a tu pagina personal&nbsp;<b> <?php echo $row['user_name']; ?></b>&nbsp; aqui podras ver tus datos personales con los que te registraste en la pagina.<br>
								  Si kieres cambiar algun dato tienes que ponerte en contacto con el administrador para poder hacerlo.</p>
									</div>
					   </div>
				</div>
				<div class="col-sm-4">
				  <div class="panel panel-danger">
							<div class="panel-heading">DATOS DEL AFILIADOR SON:</div>
						<div class="panel-body">
							<dl class="dl-horizontal">
							  <dt>NOMBRES :</dt>
							  <dd><?php echo $row['user_name']; ?></dd>
							  <dt>CORREO :</dt>
							  <dd><?php echo $row['user_email']; ?></dd>
							  <dt>AFILIADOR :</dt>
							  <dd><b><?php echo $row['usuario_afiliado']; ?></b></dd>
							  <!--<dt>FECHA DE REGISTRO :</dt>
							  <dd><?php //echo $row['joining_date']; ?></dd>-->
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Solicitar Retiro</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
          <div class="col-md-6">MI SALDO :</div>
          <div class="col-md-6">Bs. <?=$saldo;?></div>
          <br><br>
        </div>
        <form class="cmxform" id="formRetiro" method="POST" action="solicitarRetiro.php" role="form">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Monto a Retirar:</label>
            <input type="text" class="form-control" id="number" name="number">
            <div id="Info"></div>          
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Mensaje:</label>
            <textarea class="form-control" id="message" name="message"></textarea>
          </div>

          <div class="form-group" align="center">
          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<input type="submit" value="Enviar Solicitud" class="btn btn-primary btn-large">
		  </div>

        </form>
      </div>      
    </div>
  </div>
</div>

<!---End-content---->

<script src="js/sidenav.min.js"></script>
<script>$('[data-sidenav]').sidenav();</script>
	</body>
</html>

