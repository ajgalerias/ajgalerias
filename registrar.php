
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>JulenAdri</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">

<?php


$nombre=$_POST['Nombre'];
$apellido=$_POST['Apellido'];
$apellido2=$_POST['Apellido2'];
$password=$_POST['Password'];
$password2=$_POST['Password2'];
$correo=$_POST['Correo'];
$socio=

  //$mysqli=mysqli_connect("localhost","root","","galeria") or die(mysql_error());
  $mysqli=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
   if (!$mysqli) {
   echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
   exit;
}
        

//VALIDACIONES!

function validarNombre($nombre){
    
	if ($nombre==''){
        return false;
    }
    return true;
}

function apellidoVacio1($apellido){
    
	if ($apellido==''){
        return false;
    }
    return true;
}

function apellidoVacio2($apellido2){
    
	if ($apellido2==''){
        return false;
    }
    return true;
}


function passMIN1($password){
	if(strlen($password)<6){
       		return false; 
    }
	return true;
}

function passMIN2($password2){
	if(strlen($password2)<6){
       		return false; 
    }
	return true;
}

function passIgual($password,$password2){
	if($password != $password2){
       		return false; 
    }
	return true;
}


function correo($correo){
    //HAY QUE CAMBIAR ESTO !!!!!!!
    
	$expRegu = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/';
	return preg_match($expRegu, $correo);
}


//COMPROBACIONES

if(validarNombre($nombre) == false ){
  echo "El nombre esta vacio";
  exit;
}

if(apellidoVacio1($apellido) == false){
  echo "El apellido esta vacio";
  exit;
}

if(apellidoVacio2($apellido2) == false){
  echo "El segundo apellido esta vacio";
  exit;
}

if(passMIN1($password) == false){
  echo "La contrasea introducida debe tener minimo 6 caracteres";
  exit;
}

if(passMIN2($password2) == false){
  echo "La segunda contrasea introducida debe tener minimo 6 caracteres";
  exit;
}

if(passIgual($password, $password2) == false){
  echo "Las contraseas no son iguales";
  exit;
}

if(correo($correo) == false){
  echo "El mail introducido no es correcto.";
  echo "<p> <a href='registro.php'> VOLVER A REGISTRO </a>";
  exit;
}

if (isset($_POST['Correo'])&& empty($_POST['Correo']))  {
  echo "Error, tienes que rellenar el campo del correo.";
  exit;
} 

$sql="INSERT INTO Usuario (Nombre, Apellido, Apellido2, Password,Password2, Correo,Socio) VALUES( '$nombre','$apellido','$apellido2','$password','$password2','$correo','NO')";

if (!mysqli_query($mysqli ,$sql)){
  		die('Error: ' . mysqli_error($mysqli));
	}
   
   
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>JulenAdri</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">



 <?php  
echo"</br></br></br></br></br>"; 
echo "<h2>TU PETICION PARA SER SOCIO DE NUESTROS ALBUMES HA SIDO REGISTRADA, EN BREBES EL ADMINISTRADOR PODRA DARTE DE ALTA PARA APROBECHAR TODAS LAS VENTAJAS DE NUESTRA GALERIA DE FOTOS GRATUITA</h2>";
echo"</br>";
echo "<a  href='home.php' > <img src='images/casa.png'></a>";
echo " <a href='home.php' style='color:#E59866'> VOLVER A INICIO </a>";




mysqli_close($mysqli);
		
	
	
 
?>