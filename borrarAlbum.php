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


$album=$_POST['select1'];
$mysqli=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
 //$mysqli=mysqli_connect("localhost","root","","galeria") or die(mysql_error());
 
   if (!$mysqli) {
   echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
   exit;
}
        

	$sql="delete  from Album where Nombre = '$album'";
	
	if (!mysqli_query($mysqli ,$sql)){
  		die('Error: ' . mysqli_error($mysqli));
		}
	
	
	echo"</br></br></br></br></br>"; 
	echo "<h2>EL ALBUM HA SIDO BORRADO</h2>";
	echo "<a  href='revisarUsuarios.php' > <img src='images/album.png'></a>";
	echo " <a href='revisarUsuarios.php' style='color:#E59866'> BORRA MAS ALBUMES </a>";
	echo"</br>";
	echo "<a  href='home.php' > <img src='images/casa.png'></a>";
	echo " <a href='home.php' style='color:#E59866'> VOLVER A INICIO </a>";
	
	


?>
