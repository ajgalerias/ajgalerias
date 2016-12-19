<?php
header('Content-Type: text/html; charset=UTF-8');

$mysqli=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());
//$mysqli=mysqli_connect("mysql.hostinger.es","u313262353_root","ajarevilla","u313262353_gal") or die(mysql_error());

 if (!$mysqli) {
   echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
   exit;
}
$UsuariO=$_GET["user"];
$Imagenes = mysqli_query($mysqli, "select * from Imagen" ); //hay que meterle where user=$UsuariO
echo '<table border=1> <tr> 
<th> Imagen </th>
</tr>';
while ($row = mysqli_fetch_array( $Usuarios )) {
echo '<tr>
<td>' . "<img src= '".$row['Imagen']."'/>" . '</td>
</tr>';

}
echo '</table>';
$Usuarios->close(); 
mysqli_close($mysqli);

?>

