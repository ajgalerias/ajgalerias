<?php

session_start();
?>
<html>
<script language="javascript">

function nombreVacio(){
  var frm = document.getElementById("registro");
  
     if(frm.elements[0].value=='' ){
         return false;
     } 
      else return true;
  }
function apellidoVacio1(){
  var frm = document.getElementById("registro");
  
     if(frm.elements[1].value=='' ){
         return false;
     } 
      else return true;
  }
    
    function apellidoVacio2(){
  var frm = document.getElementById("registro");
  
     if(frm.elements[2].value=='' ){
         return false;
     } 
      else return true;
  }
  function passMIN1(){

 var frm = document.getElementById("registro");

   if(frm.elements[3].value.length<6){
        return false;
   }
     else return true;
   }
   
    
function passMIN2(){

 var frm = document.getElementById("registro");

  if(frm.elements[4].value.length<6){
        return false;
   }
     else return true;
   }
    
function passIgual(){

 var frm = document.getElementById("registro");

   var pass1=frm.elements[3].value;
   var pass2=frm.elements[4].value;
   if(pass1!=pass2){
       return false;
   }
    else return true;
   }
   
   function mail(){
var frm = document.getElementById("registro");
var aux=new RegExp(/^[a-z]+([0-9]{3})*@[ikasle.ehu]*(.[es|eus])$/);
      if(!aux.test(frm.elements[6].value)){
          return false;
      }
        else return true;
  	}
    
  
    
function validacionREGISTRO(){
    
if(nombreVacio()==false){
     alert("El nombre esta vacio \n" );
     return false;
 }
 if(apellidoVacio1()==false){
     alert("El apellido esta vacio \n" );
     return false;
 }
if(apellidoVacio2()==false){
    alert("El segundo apellido esta vacio \n" );
    return false;
 }
 
 if(passMIN1()==false){
    alert("La contrase?a tiene que tener minimo 6 caracteres");
     return false;
 }
 if(passMIN2()==false){
    alert("La repeticion de la contrase?a tiene que tener minimo 6 caracteres");
     return false;
 }
  
    
 if(passIgual()==false){
      alert("Las contrase?as deben ser iguales");
      return false;
 }


}


</script>
<!--CABECERAS-->
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
<!--FORMULARIO-->

<form id='registro' name='registro' onSubmit='return validacionREGISTRO()' action="registrar.php" method="post" enctype="multipart/form-data">
<p>
<label for="nombre"><b>Nombre (*):</b> </label>
<input type="text" name="Nombre" id="Nombre">
<br/> <br/>
<label for="apellido"><b>Apellido (*):</b> </label>
<input type="text" name="Apellido" id="Apellido">
<br/> <br/>
<label for="apellido2"><b>Segundo apellido (*):</b> </label>
<input type="text" name="Apellido2" id="Apellido2">
<br/><br/>
<label for="password"><b>Contrase?a (*):</b> </label>
<input type="password" name="Password" id="Password" onchange="enviarPass()">
<br/> <br/>
<label for="password2"><b>Repetir Contrase?a (*):</b> </label>
<input type="password" name="Password2" id="Password2">
<br/> <br/>

<label for="correo"><b>Correo (*):</b> </label>
<input type="text" name="Correo" id="Correo" onchange="enviarMatricula()" >
<br/> <br/>

<input type="submit" value="Enviar">
</p>
</form>


<!--CABECERAS DE ABAJO-->
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




