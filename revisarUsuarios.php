<?php

session_start();

if (!($_SESSION['user']=="admin@ehu.a")){

 header("Location: home.php"); }

?>

<script language="javascript">


function divUser(){
    
 xmlhttp = new XMLHttpRequest();
 xmlhttp.onreadystatechange=function()
 {
 if (xmlhttp.readyState==4 && xmlhttp.status==200)
 {document.getElementById("div0").innerHTML=xmlhttp.responseText; }
 }
 xmlhttp.open("GET","revisarUsuarios.php",true); 
 xmlhttp.send();
 document.getElementById('div1').style.display='none';
document.getElementById('divCab').style.display='none';

}

function divAlta(){
    
 xmlhttp = new XMLHttpRequest();
 xmlhttp.onreadystatechange=function()
 {
 if (xmlhttp.readyState==4 && xmlhttp.status==200)
 {document.getElementById("div0").innerHTML=xmlhttp.responseText; }
 }
 xmlhttp.open("GET","darAltaForm.php",true); 
 xmlhttp.send();
document.getElementById('div1').style.display='block';
document.getElementById('divCab').style.display='block';
}

function divBaja(){
    
 xmlhttp = new XMLHttpRequest();
 xmlhttp.onreadystatechange=function()
 {
 if (xmlhttp.readyState==4 && xmlhttp.status==200)
 {document.getElementById("div0").innerHTML=xmlhttp.responseText; }
 }
 xmlhttp.open("GET","darBajaForm.php",true); 
 xmlhttp.send();

 document.getElementById('div1').style.display='block';
document.getElementById('divCab').style.display='block';
}

function divAlbum(){
    
 xmlhttp = new XMLHttpRequest();
 xmlhttp.onreadystatechange=function()
 {
 if (xmlhttp.readyState==4 && xmlhttp.status==200)
 {document.getElementById("div0").innerHTML=xmlhttp.responseText; }
 }
 xmlhttp.open("GET","borrarAlbumForm.php",true); 
 xmlhttp.send();

 document.getElementById('div1').style.display='block';
document.getElementById('divCab').style.display='block';
}

</SCRIPT>

<!DOCTYPE html>


<html>
<head>
	<title>JulenAdri</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
	
</head>
<body id="top">
<div class="wrapper col2" id="divCab" >
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
 <input type="button" name="insertar" value="VER USUARIOS" onClick=" divUser()">
 <input type="button" name="insertar" value="DAR DE ALTA" onClick=" divAlta()">
 <input type="button" name="insertar" value="DAR DE BAJA" onClick=" divBaja()">
  <input type="button" name="insertar" value="BORRAR ALBUM" onClick=" divAlbum()">
<br/> <br/><br/> 
</form>
</div>
<div id="div0"> 
<?php
header('Content-Type: text/html; charset=UTF-8');
$mysqli=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
//$mysqli=mysqli_connect("localhost","root","","galeria") or die(mysql_error());
  
   if (!$mysqli) {
   echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
   exit;
}
    


$us = mysqli_query($mysqli, "select * from Usuario" );
echo '<p></p>';
    echo '<p></p>';
    echo '<p></p>';
    echo '<p></p>';
    echo '<p></p>';
    
    
echo '<table border=1> <tr> 
<th> Nombre </th>
<th> Apellido </th>
<th> 2do Apellido </th>
<th> Correo </th>
<th> Socio </th>

</tr>';
while ($row = mysqli_fetch_array( $us )) {
echo '<tr>
<td>' . $row["Nombre"] . '</td>
<td>' . $row["Apellido"] . '</td>
<td>' . $row["Apellido2"] . '</td>
<td>' . $row["Correo"] . '</td>
<td>' . $row["Socio"] . '</td>
</tr>';

}


echo '</table>';
$us->close(); 
mysqli_close($mysqli);

?>

</div>
</body>
</html>
 


