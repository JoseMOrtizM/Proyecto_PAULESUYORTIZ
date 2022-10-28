<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>PAULESU_Y_ORTIZ_INICIO</title>
<link rel="stylesheet" href="Estilo_Principal.css"/>
</head>

<body>
<header style="width:100%">
<table style="width:100%;">
<td style="width:220px"><img src="Imagenes/Logo.jpg" width="220" height="90"></td>
<td class="titulo">PAULESU & ORTIZ Ingeniería y Diseño C.A.</td>
</table>
</header>
<nav>
<blockquote><a  href="Contactenos.html">Contáctenos</a></blockquote>
<blockquote><a  href="index.html">Inicio</a></blockquote>
</nav>
<br><br>
<section>

<?php
try{
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$correo=$_POST["correo"];
	$comentario=$_POST["comentario"];
	$fecha=getdate();
	$fecha_actual=$fecha["year"] . "-" . $fecha["mon"] . "-" . $fecha["mday"];
	$hora_actual=$fecha["hours"] . ":" . $fecha["minutes"] . ":" . $fecha["seconds"];
	
	require ("Conexion.php");
	$consulta="SELECT * FROM `mensajes_recibidos` WHERE NOMBRE = '$nombre' AND APELLIDO = '$apellido' AND CORREO = '$correo' AND MENSAJE = '$comentario'";
	$resultados=mysqli_query($conexion,$consulta);
	$cuenta=0;
	while(($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC))==true){
		$cuenta=1;}
	if($cuenta==1){echo "<br><h1>Hola $nombre $apellido.</h1><br><h2>Ya Habíamos recibido su mensaje. Tan pronto como nos sea posible estaremos comunicandonos con usted. Gracias por elegirnos...</h2><br><h3><a  href='Contactenos.html'>Volver</a></h3><br>";}else{

	$consulta="INSERT INTO mensajes_recibidos (NOMBRE, APELLIDO, CORREO, FECHA, HORA, MENSAJE) VALUES ('$nombre', '$apellido', '$correo', '$fecha_actual', '$hora_actual', '$comentario')";
	$resultados=mysqli_query($conexion,$consulta);
	echo "<br><h1>Hola $nombre $apellido.</h1><br><h2>Hemos recibido su mensaje. En breve estaremos comunicandonos con usted. Gracias por elegirnos...</h2><br><h3><a  href='Contactenos.html'>Volver</a></h3><br>";
	}
	mysqli_close($conexion);
}catch(Exeption $e){die("Error: " . $e->getMessage()) . $e->getCode() . $e->getLine();}
?>
</section>
<br><br><br><br><br><br><br><br>
<footer>
<address>
Dirección: Av. Cerro Sur, Res. Zeus, Edificio 1, piso 9; Apto. 9-4. Sector Venecia. Lecherías. Estado Anzoátegui-Venezuela.
</address>
<address>
Teléfonos: 0281-6350094 / +58-426280 2360 / +58-4148089235
</address>
<address>
E-mail: <a  href="Contactenos.html">poindca@gmail.com</a>, <a  href="Contactenos.html">paulesugiovanni@gmail.com</a>, <a  href="Contactenos.html">mariellaortiz75@gmail.com</a>
</address>
</footer>
</footer>

</body>
</html>