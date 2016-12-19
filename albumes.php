<?php

session_start();

if(empty($_SESSION['user'])){

 header("Location: home.php"); }

?>

<script language="javascript">


function divAlbum(){
    
 xmlhttp = new XMLHttpRequest();
 xmlhttp.onreadystatechange=function()
 {
 if (xmlhttp.readyState==4 && xmlhttp.status==200)
 {document.getElementById("div0").innerHTML=xmlhttp.responseText; }
 }
 xmlhttp.open("GET","albumForm.php",true); 
 xmlhttp.send();

document.getElementById('div1').style.display='block';
document.getElementById('divCab').style.display='block';
document.getElementById('div3').style.display='block';
document.getElementById('search').style.display='block';
document.getElementById('topbar').style.display='block';
}

function divFoto(){
    
 xmlhttp = new XMLHttpRequest();
 xmlhttp.onreadystatechange=function()
 {
 if (xmlhttp.readyState==4 && xmlhttp.status==200)
 {document.getElementById("div0").innerHTML=xmlhttp.responseText; }
 }
 xmlhttp.open("GET","albumes.php",true); 
 xmlhttp.send();
 document.getElementById('div0').style.display='block';
document.getElementById('div1').style.display='none';
document.getElementById('divCab').style.display='block';
document.getElementById('div3').style.display='none';
document.getElementById('search').style.display='none';
document.getElementById('topbar').style.display='none';
}

function divVerFotos(){
    
 xmlhttp = new XMLHttpRequest();
 xmlhttp.onreadystatechange=function()
 {
 if (xmlhttp.readyState==4 && xmlhttp.status==200)
 {document.getElementById("div0").innerHTML=xmlhttp.responseText; }
 }
 xmlhttp.open("GET","misAlbumes.php",true); 
 xmlhttp.send();
document.getElementById('div1').style.display='block';
document.getElementById('divCab').style.display='block';
document.getElementById('div3').style.display='block';
document.getElementById('search').style.display='block';
document.getElementById('topbar').style.display='block';
}


</SCRIPT>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>JulenAdri</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper col1" ID="divCab">
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
<div id="div1"> 
<br/> <br/>
<br/> <br/>
<br/> <br/>
<form>
 <input type="button" name="insertar" value="Crear album" onClick=" divAlbum()">
 <input type="button" name="insertar" value="Ingresar Foto" onClick=" divFoto()">
 <input type="button" name="insertar" value="Ver mis fotos" onClick=" divVerFotos()">

<br/> <br/><br/> 
</form>
</div>
<div id="div0"> 

<form id='album' name='album'  action="fotos.php" method="post" enctype="multipart/form-data">

<label for="Imagen"><b>Ingresar archivo:</b> </label>
<input name="Imagen" type="file" accept="image/*"  id="Imagen" >
<br/><br/> 
Selecciona uno de tus albumes
<select name="select1">
   
       <?php
       $conn=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
       //$conn = mysqli_connect("localhost","root","","galeria") or die(mysql_error());
           ?>   
                 
                 <?php
                  $owner=$_SESSION['user'];
                 $consulta="select * from Album where Owner='$owner'";
                 $resultado=mysqli_query($conn,$consulta);
                        while($lista=mysqli_fetch_array($resultado)){
                        echo "<option>";
                        echo $lista['Nombre'];
                        echo "</option>";
                        }
 ?>  
</select>
<br/><br/> 
<label for="nombre"><b>Introduce tu etiqueta:</b> </label>
<input type="text" name="Etiqueta" id="Etiqueta">
<br/> <br/>

<input type="radio" name="gender" value="privada" checked> Privada<br>
  <input type="radio" name="gender" value="publica"> Publica<br>
  <input type="radio" name="gender" value="socio"> Socio
  <br/> <br/>
<input type="submit" value="Enviar">
</p>
</form>
</div>

</body>
</html>
 


