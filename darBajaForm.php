<?php

session_start();

if (!($_SESSION['user']=="admin@ehu.a")){

 header("Location: home.php"); }

?>



<!DOCTYPE html>


<html>


<div id="div3" >  
<form action="darBaja.php" method="post" >
<p>
<label for="num"><b>Correo del usuario a dar de baja(*):</b> </label>
<input type="text" name="Correo" id="Correo">
<br/> <br/>
<input type="submit" value="Dar Baja">
</p>
</form>
</div>
</html>
 

