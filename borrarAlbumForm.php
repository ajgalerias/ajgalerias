<?php

session_start();

if (!($_SESSION['user']=="admin@ehu.a")){

 header("Location: home.php"); }

?>



<!DOCTYPE html>


<html>
<script language="javascript">
//VALIDACION CORREO 
function correoVacio(){
  var frm = document.getElementById("alta");
  
     if(frm.elements[0].value=='' ){
         return false;
     } 
      else return true;
  }
  
  function validacionAlta(){
    

 if(correoVacio()==false){
     alert("El Correo esta vacio \n" );
     return false;
 }
  }
  
   </script>

<div id="div2" >  
<form action="borrarAlbum.php" method="post" >
<p>
Selecciona un album
<select name="select1">
   
       <?php
       $conn=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
       //$conn = mysqli_connect("localhost","root","","galeria") or die(mysql_error());
           ?>   
                 
                 <?php
                  $owner=$_SESSION['user'];
                 $consulta="select * from Album";
                 $resultado=mysqli_query($conn,$consulta);
                        while($lista=mysqli_fetch_array($resultado)){
                        echo "<option>";
                        echo $lista['Nombre'];
                        echo "</option>";
                        }
 ?>  
</select>

<br/> <br/>
<input type="submit" value="BORRAR ALBUM">
</p>
</form>
</div>




</html>
 


