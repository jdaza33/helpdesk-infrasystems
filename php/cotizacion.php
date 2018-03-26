<?php
session_start();
?>
<?php

include("conexion.php");

$op=$_GET['op'];

if($op==1){
    registrar();
}else if($op==2){
    resumen();
}else if($op==3){
    cambiarClave();
}

function registrar(){
    include("conexion.php");

    $descripcion=$_POST['descripcion'];
    $urgencia=$_POST['urgencia'];
    $usuario=$_SESSION['id'];
    $fecha = new DateTime();
    $fechaa = $fecha->format('Y-m-d H:i:s');

    mysqli_query($db, "INSERT INTO cotizacion 
    (fecha_cotizacion, id_usuario, descripcion_cotizacion, urgencia, estado_cotizacion) 
    VALUES ('$fechaa','$usuario','$descripcion', '$urgencia', 'P')");

    
    $r['res']=true;
    echo json_encode($r);
}

function resumen(){
    include("conexion.php");

    $idCliente=$_POST['id'];

    $sql="SELECT * FROM soporte a INNER JOIN cliente b ON a.id_cliente=b.id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {   
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row){
            $r['id']=$row['id'];
            $r['nombre_cliente']=$row['nombre']." ".$row['apellido'];
            $r['sexo']=$row['sexo'];
            $r['id_empresa_base']=$row['id_empresa_base'];
            $r['nacimiento']=$row['nacimiento'];
            $r['fecha_registro']=$row['fecha_registro']; 
        }
    }

    echo json_encode($r);
}



?>
