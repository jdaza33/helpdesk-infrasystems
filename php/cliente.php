<?php
session_start();
include("conexion.php");

$op=$_GET['op'];

if($op==1){
    registrar();
}else if($op==2){
    consultar();
}else if($op==3){
    cambiarClave();
}else if($op==4){
    updatePerfil();
}

function registrar(){
    include("conexion.php");
    include("datos.php");
    

    $nit=$_POST['nit'];
    $tipoCliente=$_POST['tipoCliente'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $usuario=$_POST['usuario'];
    $clave=md5($_POST['clave']);

    $fecha = new DateTime();
    $fechaa = $fecha->format('Y-m-d');

    mysqli_query($db, "INSERT INTO cliente 
    (identificacion, nombre, apellido, email, direccion, telefono, tipo_cliente, sexo, id_empresa_base, nacimiento, fecha_registro) 
    VALUES ('$nit','$nombre', '$apellido', '$email','','', '$tipoCliente', '', '', '', '$fechaa')");

    $sql="SELECT * FROM cliente ORDER BY id DESC LIMIT 1";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {   
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row){
            $id_cliente = $row['id'];
            if($tipoCliente==3){
                mysqli_query($db, "INSERT INTO login 
                (id_admin_cliente, usuario, clave, rol, foto) 
                VALUES ('$id_cliente','$usuario', '$clave', '1', 'perfil.png')");
            }else if ($tipoCliente==1){
                mysqli_query($db, "INSERT INTO login 
                (id_admin_cliente, usuario, clave, rol, foto) 
                VALUES ('$id_cliente','$usuario', '$clave', '4', 'perfil.png')");
            }else{
                mysqli_query($db, "INSERT INTO login 
                (id_admin_cliente, usuario, clave, rol, foto) 
                VALUES ('$id_cliente','$usuario', '$clave', '2', 'perfil.png')");
            }
            

        }
    }

    if (file_exists($rutaSubida.$usuario)) {

    } else {
        mkdir($rutaSubida.$usuario, 0777);
        copy("../images/perfil.png",$rutaSubida.$usuario."/perfil.png");
    }

    


    $r['res']=true;
    echo json_encode($r);
}

function consultar(){
    include("conexion.php");

    $idCliente=$_POST['id'];

    $sql="SELECT * FROM cliente WHERE id='$idCliente'";
    $sql2="SELECT * FROM login WHERE id_admin_cliente='$idCliente'";
    $result = $db->query($sql);
    $result2 = $db->query($sql2);

    $r['res']=false; 

    if ($result->num_rows > 0) {   
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row){
            
            $r['nit']=$row['identificacion'];
            $r['nombre']=$row['nombre'];
            $r['apellido']=$row['apellido'];
            $r['email']=$row['email'];
            $r['direccion']=$row['direccion'];
            $r['telefono']=$row['telefono'];
            $r['tipo_cliente']=$row['tipo_cliente'];
            $r['sexo']=$row['sexo'];
            $r['id_empresa_base']=$row['id_empresa_base'];
            $r['nacimiento']=$row['nacimiento'];
            $r['fecha_registro']=$row['fecha_registro']; 

            $r['res']=true; 
        }
    }

    if ($result2->num_rows > 0) {   
        $row2 = $result2->fetch_array(MYSQLI_ASSOC);
        if($row2){
            $r['usuario']=$row2['usuario'];
            $rol=$row2['rol'];
            if($rol==1){
                $rol="Administrador";
            }else if ($rol==2){
                $rol="Avanzado";
            }else{
                $rol="Operador";
            }
            $r['rol']=$rol;

        }
    }

    echo json_encode($r);
}

function cambiarClave(){

    include("conexion.php");

    $id=$_POST['id'];
    $newPass=md5($_POST['pass']);

    $sql = "UPDATE login SET clave='$newPass' WHERE id_admin_cliente='$id'";

    if (mysqli_query($db, $sql)) {
        $r['res']=true;
    } else {
        $r['res']=false;
    }

    echo json_encode($r);
}

function updatePerfil(){

    include("conexion.php");

    $nit=$_POST['nit'];
    $nombre=$_POST['nombre_perfil'];
    $apellido=$_POST['apellido'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $genero=$_POST['genero'];
    $nacimiento=$_POST['nacimiento'];

    if(isset($_POST['password'])){
        $newPass=md5($_POST['password']);
        $id=$_SESSION['id'];
        $sql_pass = "UPDATE login SET clave='$newPass' WHERE id='$id'";
        if (mysqli_query($db, $sql_pass)) {
            $r['res_pass']=true;
        } else {
            $r['res_pass']=false;
        }
    }

    $sql = "UPDATE cliente SET nombre='$nombre', apellido='$apellido', direccion='$direccion', 
    telefono='$telefono', sexo='$genero', nacimiento='$nacimiento'
     WHERE identificacion='$nit'";

    if (mysqli_query($db, $sql)) {
        $r['res_personal']=true;
    } else {
        $r['res_personal']=false;
    }

    echo json_encode($r);

}

?>
