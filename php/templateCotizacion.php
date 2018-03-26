<?php
include("conexion.php");

$usuario=$_GET['usuario'];
$solicitud=$_GET['solicitud'];

$sql="SELECT * FROM cotizacion WHERE id_usuario='$usuario' AND nro_solicitud='$solicitud'";
$result = $db->query($sql);

if ($result->num_rows > 0) {   
    while($row = $result->fetch_assoc()){
        echo "<h1>-- COTIZACION --</h1>";
        echo "<br>";
        echo "<br>";
        echo "<h4>Fecha: ".$row['fecha_cotizacion']."</h4>";
        echo "<h4>Nro. Solicitud: ".$row['nro_solicitud']."</h4>";
        echo "<br>";
        echo "<br>";
        echo "<h4>Descripcion: ".$row['descripcion_cotizacion']."</h4>";
        echo "<br>";
        echo "<h4>Urgencia: ".$row['urgencia']."</h4>";
    }
}
?>