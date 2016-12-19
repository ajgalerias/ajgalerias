<?php

session_start();

if (!($_SESSION['user']=="admin@ehu.a")){

 header("Location: home.php"); }

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>JulenAdri</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">
<?php


$correo=$_POST['Correo'];
$mysqli=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
 //$mysqli=mysqli_connect("localhost","root","","galeria") or die(mysql_error());
 
   if (!$mysqli) {
   echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
   exit;
}
        
 if (isset($_POST['Correo'])&& empty($_POST['Correo']))  {
  echo "Error, tienes que rellenar el campo del correo.";
  exit;}
     



  
$us = mysqli_query($mysqli, "select * from Usuario where Correo = '$correo' and Socio= 'SI'");
$cont= mysqli_num_rows($us); 
if($cont==1) {
	$sql="update Usuario set Socio='NO' where Correo='$correo'";
	
	if (!mysqli_query($mysqli ,$sql)){
  		die('Error: ' . mysqli_error($mysqli));
		}
	else{
	
	
	echo"</br></br></br></br></br>"; 
	echo "<h2>EL USUARIO HA SIDO DADO DE BAJA</h2>";
	echo "<a  href='revisarUsuarios.php' > <img src='images/user.png'></a>";
	echo " <a href='revisarUsuarios.php' style='color:#E59866'> DAR DE BAJA MAS USUARIOS </a>";
	echo"</br>";
	echo "<a  href='home.php' > <img src='images/casa.png'></a>";
	echo " <a href='home.php' style='color:#E59866'> VOLVER A INICIO </a>";
	

	}
	}

else{

echo"</br></br></br></br></br>"; 
	echo "<h2>EL CORREO NO ESTA EN LA BASE DE DATOS O EL USUARIO NO ES SOCIO</h2>";
	
	echo"</br>";
	echo "<a  href='home.php' > <img src='images/casa.png'></a>";
	echo " <a href='home.php' style='color:#E59866'> VOLVER A INICIO </a>";

	
}
?>
