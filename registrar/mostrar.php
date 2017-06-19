<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- banner <title>http://obedalvarado.pw/php-scripts.php</title>-->
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
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
						<div class="w3layouts-logo">
							<h1><a href="index.html">NEGOCIOSAIG</a></h1>
						</div>
					</div>
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="nav navbar-nav">
								<li><a href="../index.html">INICIO</a></li>
								<li><a href="#" class="scroll">Quienes Somos</a></li>
								<li><a href="#" class="scroll">Opciones de Negocio</a></li>
								<li><a href="#" class="scroll">Servicios</a></li>
								<li><a href="#">Registrate</a></li>
                                <li><a href="#" class="scroll">Contactos</a></li>
							</ul>
						</nav>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //banner -->
<div class="container">
<?php
function conectarse($host,$usuario,$password,$BBDD){ 
   $link=mysql_connect($host,$usuario,$password) or die (mysql_error()); 
   mysql_select_db($BBDD,$link) or die (mysql_error()); 
   return $link; 
} 

//$link=conectarse("sql305.260mb.net", "n260m_13805882", "d4rkm1nd","n260m_13805882_negocios");  
$link=conectarse("localhost", "root", "d4rkm1nd","negocios");
$sql = "SELECT * FROM usuarios"; 
$sql = mysql_query($sql, $link); 
?> 
<html> 
<head> 
<title>ALgo</title> 
</head> 
<body> 
<br>
<h2 align="center">USUARIOS REGISTRADOS</h2>
<div class="table-responsive">
<table align="center"  class="table table-hover"> 
<? 

echo "<tr>";  
echo "<th>Nombre</th>";  
echo "<th>Apellidos</th>";  
echo "<th>Cedula / DNI</th>";  
echo "<th>Numero Movil</th>";  
echo "<th>Correo Electronico</th>";
echo "<th>Nombre de usuario</th>";   
echo "</tr>";

  while($rs=mysql_fetch_array($sql)) 
  { 
    echo "<tr>" 
           ."<td>".$rs['nombres']."</td>" 
           ."<td>".$rs['apellidos_usuario']."</td>" 
           ."<td>".$rs['ci_usuario']."</td>" 
           ."<td>".$rs['telefono_usuario']."</td>" 
           ."<td>".$rs['usuario_email']."</td>" 
           ."<td>".$rs['usuario_nombre']."</td>" 
           ."</tr>"; 
  } 
?> 
</table> 
</div>
<br>
</body> 
</html>

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
