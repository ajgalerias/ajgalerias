

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>JulenAdri</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">

<?php
session_start();

//conectar bd y coger correos
//$link = mysqli_connect("localhost","root","","galeria") or die(mysql_error());
$link=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
$correo=$_POST['Correo'];
$password=$_POST['Password'];


//validaciones//

function validarCorreo($correo){
    
	if ($correo==''){
        return false;
    }
    return true;
}

function validarPass($password){
    
	if ($password==''){
        return false;
    }
    return true;
}

//COMPROBACIONES

if(validarCorreo($correo) == false ){
  echo "El correo esta vacio";
  exit;
}

if(validarPass($password) == false){
  echo "La contraseña esta vacia";
  exit;
}
//mas seguridad
 if (isset($_POST['Correo'])&& empty($_POST['Correo']))  {
  echo "Error, tienes que rellenar el campo del correo.";
  exit;
} 




$usuarios = mysqli_query($link, "select * from Usuario where Correo='$correo' and Password='$password' and Socio='SI'");
$cont= mysqli_num_rows($usuarios); 
if($cont==1) {


$_SESSION['user']=$correo;
$_SESSION['pass']=$password;



?>


<?php

	if ($_SESSION['user']=="admin@ehu.a"){
	echo"</br></br></br></br></br>"; 
	echo "<h2>BIENVENIDO A NUESTRA GALERIA</h2>";
	echo "<a  href='revisarUsuarios.php' > <img src='images/user.png'></a>";
	echo " <a href='revisarUsuarios.php' style='color:#E59866'> VAMOS A REVISAR USUARIOS </a>";
	echo"</br>";
	echo "<a  href='home.php' > <img src='images/casa.png'></a>";
	echo " <a href='home.php' style='color:#E59866'> VOLVER A INICIO </a>";
		 
	}
	else if(!empty($_SESSION['user'])){
	echo"</br></br></br></br></br>"; 
	echo "<h2>BIENVENIDO A NUESTRA GALERIA</h2>";
	echo "<a  href='albumes.php' > <img src='images/album.png'></a>";
	echo " <a href='albumes.php' style='color:#E59866'> EMPIEZA CREANDO TU PRIMER ALBUM </a>";
	echo"</br>";
	echo "<a  href='home.php' > <img src='images/casa.png'></a>";
	echo " <a href='home.php' style='color:#E59866'> VOLVER A INICIO </a>";
    }
}

else {


	echo"</br></br></br></br></br>"; 
	echo " <a href='login.php' style='color:#E59866'> ERROR! HAS INTRODUCIDO MAL LOS DATOS O AUN NO HAS SIDO DATO DE ALTA</a>";
	echo"</br>";
	echo "<a  href='home.php' > <img src='images/casa.png'></a>";
	echo " <a href='home.php' style='color:#E59866'> VOLVER A INICIO </a>";
    
    }
?>
