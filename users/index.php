<!DOCTYPE HTML>
<html>
<head>
<title>NEGOCIOSAIG</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/styleboot.css" rel="stylesheet" type="text/css"  media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css"  media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,800,600,400' rel='stylesheet' type='text/css'>
<script src="js/responsive-nav.js" type="text/javascript"></script>
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<script type="text/javascript">
		$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				firstname: {
					required: true, 
     				minlength: 3},
				
			},
			messages: {
				firstname: "El nombre tiene 3 caracteres como minimo",
			}
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
					<a href="../index.html"><img src="../images/logo.jpg" height="80"></a>
				</div>
			</div>
			<!---start-top-nav---->
			<div class="top-nav">
				<div class="top-nav-left">
					 <div id="nav">
				      <ul>
				        <li><a href="../index.html">INICIO</a></li>
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
		     <div class="content"><br><br><br>	 	
		      	<form action="check_afiliado_register.php" name="customForm" id="signupForm" method="POST" role="form" >
                    <div class="signup-form-container">
                        <div class="form-body">	    		
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-search texthead"></span></div>
                                    <input id="firstname" name="firstname" type="text" class="form-control"  placeholder="Ingrese el Nombre de su Referido">
                                    <div id="Info"></div>
                                </div>
                                <span class="help-block" id="error"></span>
                            </div>
                            <div align="center">
                                    <button type="submit" class="btn btn-primary btn-large"><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Buscar</button>
                            </div>
                        </div>
                    </div>
				</form> <br><br><br>
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

