<!DOCTYPE HTML>
<html>
<head>
<?php
sleep(1);
include('dbcon.php');

	$username 	= $_POST['firstname'];
	$query = "select * from tbl_users where user_name = '".strtolower($username)."'";
	$results = mysql_query( $query) or die('ok');
	$arreglo = mysql_fetch_row($results);
	$idpadrino = trim($arreglo[0]);
	/*if ($row = mysql_fetch_row($query))
	 {
		   $idpadrino = trim($row[0]);
		$idpadrino;

	 }*/
	if(mysql_num_rows(@$results) > 0)
	{
		//header("location: register_afiliado.php ");
	?>
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
<script src="js/responsive-nav.js" type="text/javascript"></script>
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
		 <div class="wrap"><br><br><br>
			 <!--<div class="about-desc">-->
			 <div class="content">
				<div class="panel panel-success">
				<div class="panel-heading" align="center">El Usuario <h3> <?php echo $username;?> </h3>si esta en nuestro sistema.</div>
				<div class="panel-body"><p>Por favor registra tus datos en el siguiente enlace:</p>
		<?php echo '<a href="form_register_afiliado.php?nombre='.$idpadrino.'" class="btn btn-primary btn-lg btn-block" role="button">Registrarse...</a>';?></div>
	</div><br><br><br>
			</div>
			<!--</div>-->
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
<?
	}
	else
	{
		echo '<div id="error">Nombre de Referido no existe</div>';
		header("location: registro.php ");
	}
?>
