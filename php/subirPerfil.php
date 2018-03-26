<?php
session_start();

$usuario=$_SESSION['usuario'];

?>
<?php

	include("datos.php");

	$fecha = new DateTime();
	$fechaa = $fecha->format('Y-m-d');
	$hora = $fecha->format("H-i-s");
	
	$mensage = '';
	foreach ($_FILES as $key) 
	{
		if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
			{
				$NombreOriginal = $key['name'];
				$extension = end(explode(".", $NombreOriginal));
				$temporal = $key['tmp_name']; 
				$temp_name="perfil.png";
				$Destino = $rutaSubida.$usuario."/".$temp_name;
				
				move_uploaded_file($temporal, $Destino); 		
			}
	
		if ($key['error']=='') //Si no existio ningun error, retornamos un mensaje por cada archivo subido
			{
				$mensage .= 'Listo';
			}
		if ($key['error']!='')//Si existio algún error retornamos un el error por cada archivo.
			{
				//$mensage .= '-> No se pudo subir el archivo <b>'.$NombreOriginal.'</b> debido al siguiente Error: n'.$key['error']; 
				$mensage .= 'No Listo'; 
			}
		
	}
?>