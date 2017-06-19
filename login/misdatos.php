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
 <script src="../js/jquery-1.10.2.min.js" type="text/javascript"></script>
  <script src="../js/responsive-nav.js" type="text/javascript"></script>
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
		  <li><a href=></a></li>
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
		<a href="javascript:;">
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
									  <div class="panel-heading">Mensajes y anuncios importantes:</div>
									<div class="panel-body">
										<p>Bienvenido a tu pagina personal&nbsp;<b> <?php echo $row['user_name']; ?></b>&nbsp; aqui podras ver tus datos personales con los que te registraste en la pagina.<br>
								  Si kieres cambiar algun dato tienes que ponerte en contacto con el administrador para poder hacerlo.</p>
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
<!---End-content---->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/sidenav.min.js"></script>
<script>$('[data-sidenav]').sidenav();</script>
	</body>
</html>

