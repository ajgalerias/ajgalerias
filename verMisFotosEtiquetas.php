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
<br/> <br/>
<br/> <br/>


<?php


$album=$_POST['album'];
$etiqueta=$_POST['etiqueta'];


	Echo'<font size="5" >Todo sobre tu album:</font>';
	Echo'<font size="5" color=#E59866>'.$album.'</font></br>';
	echo"</br>";
	
	//conecxion y query
	
	//$mysqli=mysqli_connect("localhost","root","","galeria") or die(mysql_error());
	$mysqli=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
  
   if (!$mysqli) {
   echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
   exit;
}

$consulta = mysqli_query($mysqli, "select * from Fotos where Etiqueta='$etiqueta'" );
$cont= mysqli_num_rows($consulta); 
if($cont!=0) {

while($row=mysqli_fetch_array($consulta)){
	echo '<img src="'.$row['Nombre'].'">'."\n";
	echo"</br>";
	Echo'<font size="3" color=#E59866>'.$row['Nombre'].'</font></br>';
	

}
}
else{

echo"</br></br></br></br></br>"; 
    echo "<h2>NO EXISTEN FOTOS CON ESA ETIQUETA</h2>";
echo "<a  href='verMisFotos.php' > <img src='images/ALBUM.png'></a>";
echo " <a href='verMisFotos.php' style='color:#E59866'> VUELVE A TUS FOTOS </a>";
}

?>





