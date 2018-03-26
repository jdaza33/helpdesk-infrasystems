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

    $categoria=$_POST['categoria'];
    $subcategoria=$_POST['subcategoria'];
    $tipo=$_POST['tipo'];
    $descripcion=$_POST['descripcion'];
    $user_remoto=$_POST['user_remoto'];
    $pass_remoto=$_POST['pass_remoto'];
    $id_cliente=$_SESSION['id_admin_cliente'];

    $fecha = new DateTime();
    $fechaa = $fecha->format('Y-m-d');

    mysqli_query($db, "INSERT INTO soporte 
    (id_cliente, categoria, subcategoria, descripcion, tipo, conexion_remota, clave_remota, img, fecha_solicitud, 
    estado, solucion, fecha_cierre, id_admin, comentario) 
    VALUES ('$id_cliente','$categoria','$subcategoria', '$descripcion', '$tipo','$user_remoto', '$pass_remoto', 
    '', '$fechaa', 'G', '', '', '', '')");

    /*$sql="SELECT * FROM soporte ORDER BY nro DESC";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {   
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row){

            $nro_orden=$row['nro'];

            mysqli_query($db, "INSERT INTO factura 
            (id_cliente, nro_orden, descripcion_factura, valor_base, valor_impuesto, valor_total, estado_factura, fecha_factura, 
            tipo_factura) 
            VALUES ('$id_cliente','$nro_orden','En breve...', 0, 0,0, 'P', '$fechaa', 'Soporte')");

        }
    }*/
    
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
