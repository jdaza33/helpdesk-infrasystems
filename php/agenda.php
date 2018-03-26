<?php
session_start();
?>
<?php

include("conexion.php");

$op=$_GET['op'];

if($op==1){
    registrar();
}else if($op==2){
    consultar();
}else if($op==3){

}

function registrar(){
    include("conexion.php");

    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $fecha_inicio=$_POST['fecha_inicio'];
    $fecha_fin=$_POST['fecha_fin'];
    $enlace=$_POST['enlace'];
    $color=$_POST['color'];
    $cliente=$_SESSION['id_admin_cliente'];
    
    $fecha = new DateTime();
    $fechaa = $fecha->format('Y-m-d H:i:s');

    mysqli_query($db, "INSERT INTO agenda 
    (id_cliente, nombre_evento, descripcion_evento, fecha_inicio, fecha_fin, enlace, color) 
    VALUES ('$cliente','$nombre','$descripcion', '$fecha_inicio', '$fecha_fin', '$enlace', '$color')");

    
    $r['res']=true;
    echo json_encode($r);
}

function consultar(){
    include("conexion.php");

    $cliente=$_SESSION['id_admin_cliente'];

    $sql="SELECT * FROM agenda WHERE id_cliente='$cliente'";
    $result = $db->query($sql);

    $convertToJson = array();

    if ($result->num_rows > 0) {   
        while($row = $result->fetch_assoc()){

            $r['title'] = $row['nombre_evento'];
            $r['description'] = $row['descripcion_evento'];
            $r['start'] = $row['fecha_inicio'];
            $r['end'] = $row['fecha_fin'];
            $r['url'] = $row['enlace'];
            $r['color'] = $row['color'];
            array_push($convertToJson, $r);

        }
    }

    echo json_encode($convertToJson);
}



?>
