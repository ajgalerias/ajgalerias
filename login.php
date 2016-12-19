<?php

session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<script language="javascript">

function correoVacio(){
  var frm = document.getElementById("login");
  
     if(frm.elements[0].value=='' ){
         return false;
     } 
      else return true;
  }
    
    function passVacio(){
  var frm = document.getElementById("login");
  
     if(frm.elements[1].value=='' ){
         return false;
     } 
      else return true;
  }
  
  
    
function validacionLogin(){
    

 if(correoVacio()==false){
     alert("El Correo esta vacio \n" );
     return false;
 }
if(passVacio()==false){
    alert("La contraseña esta vacia. \n" );
    return false;
 }
 
}


</script>

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
<br/>
<br/>

<form  id='login' action="comprobarLog.php"  method="post" onSubmit='return validacionLogin()'>
<label for="User"><b>Correo :</b> </label>
	  <input type="text" name="Correo" id="Correo">
	  <br/> <br/>
	  <label for="Password"><b>Contraseña (*):</b> </label>
	  <input type="password" name="Password" id="Password" >
      <br/> <br/>
	<input type="submit" value="Enviar">

</body>
</html>

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