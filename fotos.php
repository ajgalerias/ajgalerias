<?php

session_start();

if(empty($_SESSION['user'])){

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
$etiqueta=$_POST['Etiqueta'];
$radio=$_POST['gender'];

$owner=$_SESSION['user'];


//$mysqli=mysqli_connect("mysql.hostinger.es","u999368172_root","julenadri","u999368172_quiz") or die(mysql_error());
  $mysqli=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
 // $mysqli=mysqli_connect("localhost","root","","galeria") or die(mysql_error());
   if (!$mysqli) {
   echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
   exit;
}
        



//Guardar fotos   
$dir_destino = "Album/$album/";
$archivo_destino = $dir_destino . basename($_FILES["Imagen"]["name"]);
move_uploaded_file($_FILES["Imagen"]["tmp_name"], $archivo_destino);

$sql="INSERT INTO Fotos (Nombre, Owner, Etiqueta,Privacidad) VALUES( '".$archivo_destino."','$owner','$etiqueta','$radio')";
 if (!mysqli_query($mysqli ,$sql)){
  		die('Error: ' . mysqli_error($mysqli));
	}
	
	
	echo"</br></br></br></br></br>"; 
	echo "<h2>FOTO INSERTADA CORRECTAMENTE</h2>";
	echo "<a  href='albumes.php' > <img src='images/album.png'></a>";
echo " <a href='albumes.php' style='color:#E59866'> CREAR MAS ALBUMES O SUBIR MAS FOTOS </a>";
	echo"</br>";
	echo "<a  href='home.php' > <img src='images/casa.png'></a>";
	echo " <a href='home.php' style='color:#E59866'> VOLVER A INICIO </a>";

?>

