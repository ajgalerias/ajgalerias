<?php

session_start();

if(empty($_SESSION['user'])){

 header("Location: home.php"); }

?>


<!DOCTYPE html>


<html>


<div id="div1"> 

<form id='album' name='album'  action="crearAlbum.php" method="post" enctype="multipart/form-data">

<label for="num"><b>Nombre del album:</b> </label>
<input type="text" name="Album" id="Album">
<br/> <br/>
<input type="submit" value="CREAR">
</p>
</form>
</div>



</body>
</html>
 


