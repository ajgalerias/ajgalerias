<?php

session_start();

if(empty($_SESSION['user'])){

 header("Location: home.php"); }



$ruta = "Album/";
$album=$_POST['Album'];
$directorio=$ruta.$album;
$owner=$_SESSION['user'];
  
  ?>
  
  <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>JulenAdri</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">

<?php
 
if(!is_dir($directorio)){
    $crear= mkdir($directorio,0777,true);
    if($crear){
 echo"</br></br></br></br></br>";  
echo "<h2>ALBUM CREADO CORECTAMENTE</h2>";
echo "<a  href='albumes.php' > <img src='images/album.png'></a>";
echo " <a href='albumes.php' style='color:#E59866'> CREAR MAS ALBUMES O SUBIR FOTOS </a>";
ECHO"</BR>";
echo "<a  href='home.php' > <img src='images/casa.png'></a>";
echo " <a href='home.php' style='color:#E59866'> VOLVER A INICIO </a>";
    
    }
    else{
    echo"</br></br></br></br></br>"; 
       echo "<h2>ERROR TU ALBUM NO HA PODIDO CREARSE</h2>";
echo "<a  href='home.php' > <img src='images/casa.png'></a>";
echo " <a href='home.php' style='color:#E59866'> VOLVER A INICIO </a>";
    }
}
else{
echo"</br></br></br></br></br>"; 
    echo "<h2>EL NOMBRE DE ESE ALBUM YA EXISTE</h2>";
echo "<a  href='albumes.php' > <img src='images/album.png'></a>";
echo " <a href='albumes.php' style='color:#E59866'> CREAR MAS ALBUMES O SUBIR FOTOS </a>";
ECHO"</BR>";
echo "<a  href='home.php' > <img src='images/casa.png'></a>";
echo " <a href='home.php' style='color:#E59866'> VOLVER A INICIO </a>";
}

$mysqli=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
 // $mysqli=mysqli_connect("localhost","root","","galeria") or die(mysql_error());
  
   if (!$mysqli) {
   echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
   exit;
}
//queda meterle el dueño cuando hagamos sesiones.
$sql="INSERT INTO Album (Nombre, Owner) VALUES('$album','$owner')";

if (!mysqli_query($mysqli ,$sql)){
  		die('Error: ' . mysqli_error($mysqli));
	}

    ?>