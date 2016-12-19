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
<form action="darAlta.php" method="post" >
<p>

<label for="num"><b>Correo del usuario a dar de alta(*):</b> </label>
<input type="text" name="Correo" id="Correo">
<br/> <br/>
<input type="submit" value="Dar Alta">
</p>
</form>
</div>




</html>
 


