<?php

session_start();

if(empty($_SESSION['user'])){

 header("Location: home.php"); }

?>

<script language="javascript">

</SCRIPT>

<!DOCTYPE html>


<html>
<head>
	<title>JulenAdri</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">

<div id="div1"> 

<form   action="verMisFotos.php" method="post" enctype="multipart/form-data">
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
 <input type="submit" name="Seleccion" value="Selecciona tu album">

<br/> <br/><br/> 
</form>
</div>

</body>
</html>
 


