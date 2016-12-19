
<?php

session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>JulenAdri</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper col1">
  <div id="topbar">
    <div id="search">
      <form action="#" method="post">
        <fieldset>
         
       
        </fieldset>
      
      </form>
    </div>
  </div>
</div>
<div class="wrapper col2">
  <div id="header">
    <div id="logo">
      <h1><a href="home.php">JulenAdri</a></h1>
      <p>Tu album de fotos gratuito</p>
      
    </div>
      	
    <ul id="topnav">
      <?php
							if(empty($_SESSION['user'])){
							}
							else if ($_SESSION['user']=="admin@ehu.a"){
							echo" <li class='active'><a href='revisarUSUARIOS.php'>Modificar Usuarios</a></li>";
							}
							else {
							echo "<li class='active'><a href='#'>Albumes</a>
        <ul>
          <li><a href='albumes.php'>Mi album</a></li>
          <li><a href='galeriaSocio.php'>Album  de socios</a></li>
        </ul>
      </li>";
							
							}
		?>
 
      <li class="active"><a href="galeria.php"> Galeria</a></li>
       <li class="active"><a href="#">Identificarse</a>
        <ul>
          <li><a href="login.php">Iniciar Sesion</a></li>
          <li><a href="registro.php">Registrarse</a></li>
        </ul>
      </li>
      <li class="active"><a href="home.php">Home</a></li>
    </ul>
    <br class="clear" />
  </div>
<div align="right">
  
     		<?php
     		   
							if( !empty($_SESSION['user'])){
							echo "<a style='color:#9C9D9F';>Has iniciado sesion como:</a> " ;
							echo $_SESSION['user'];
							echo"</br>";
							echo " <a href='logout.php' style='color:#E59866'> Logout </a>"; 
							}
							else if ( empty($_SESSION['user'])){
							echo "<b> <p style='color:#E59866';>DEBES INDENTIFICARTE </p></b>";
								}

			?>
<hr>
</hr>
</div>

</div>
    
    <div id="gallery">
    <ul>
      <li class="placeholder" style="background-image:url('images/camara.jpg');">Image Holder</li>
      
    </ul>
  </div>

<div class="wrapper col5">
  <div id="container">
    <div id="content">
      <h2>Sobre nosotros</h2>
        <p> <b>Bienvenidos a nuesta Galeria de imagenes</b></p>
      <p>Somos Adrian y Julen, estudiantes de informática en la especialidad de ingeniería de software. Tenemos 20 y 23 años respectivamente y este es nuestro tercer año en la facultad de informatica de la UPV.</a>.</p>
      <p>Hemos escogido esta especialidad por que  Jose Angel Vadillo nos combencio completamente durante una charla impartida en la facultad de informatica. Estamos deseosos de aprender mucho sobre lenguajes web.</p>

      
      
    </div>
    <div id="column">
      <div class="flickrbox">
        <h2 class="title">Julen & Adrian</h2>
       <img class="img-responsive" src="images/feature-2.jpg" alt="">
      </div>
    </div>
    <br class="clear" />
  </div>
</div>

<div class="wrapper col7">
  <div id="copyright">
    <ul>
      <li><a href="https://egela1617.ehu.eus">Egela</a></li>
      <li><a href="https://github.com/JulenAdri">Github</a></li>
      <li><a href="https://www.hostinger.es">Crea tu dominio</a></li>
      
      <li><a href="https://i1.rgstatic.net/ii/profile.image/AS%3A273837459767299@1442299346483_l/Jose_Zorita.png">Jose Angel Vadillo </a></li>
    </ul>
    <p>Todos los derechos reservados Julen Aja y Adrian Revilla 2016-2017 © </a></p>
    <div class="clear"></div>
  </div>
</div>
</body>
</html>