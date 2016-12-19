<?php

session_start();

if(empty($_SESSION['user'])){

 header("Location: home.php"); }

?>


<!DOCTYPE html>


<html>
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


<select name="select1">
<?php
 $correo=$_GET['Correo'];
 $mysqli=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
//$mysqli=mysqli_connect("localhost","root","","Quiz") or die(mysql_error());
   if (!$mysqli) {
   echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
   exit;
}

$albun = mysqli_query($mysqli, "select * from Albumes where Correo = '$correo'");

$resultado=mysqli_query($mysqli,$albun);
	while($lista=mysqli_fetch_array($resultado)){
 
	    ?> 
                    <option value=" <?php echo $row['Album'] ?> " >
					<?php echo $row['Album']; ?>
					</option>
    <? } ?>

</select>


</body>
</html>
 
