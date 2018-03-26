
<?php
include("conexion.php");

$op=$_GET['op'];

if($op==1){
    login();
}else if($op==2){
    logout();
}else if($op==3){
    recordarClave();
}

function login(){
    session_start();
    include("conexion.php");

    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];

    $sql="SELECT * FROM login WHERE usuario='$usuario' AND clave='".md5($clave)."'";
    $result = $db->query($sql);
    
    $r['res']=false;
    if ($result->num_rows > 0) {   
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row){
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] =  $row['id'];
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['id_admin_cliente'] = $row['id_admin_cliente'];
            $_SESSION['foto'] = $row['foto'];

            
    
            $r['res']=true;
        }else{
            $r['res']=false;
        }
    }
    
    echo json_encode($r);
} 

function logout(){
    session_start();
    unset ($SESSION['usuario']);
    session_destroy();

    header("location: ../index.php");
}

function recordarClave(){

    include("conexion.php");

    $email=$_POST['email'];
    $newPass=md5(12345);

    $sql="SELECT * FROM cliente WHERE email='$email'";
    $result = $db->query($sql);
    
    $r['res']=false;
    if ($result->num_rows > 0) {   
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row){
            $id=$row['id'];
            $sql2 = "UPDATE login SET clave='$newPass' WHERE id_admin_cliente='$id'";
            if (mysqli_query($db, $sql2)) {
                $r['resUpdate']=true;
            } else {
                $r['resUpdate']=false;
            }
            $r['res']=true;
        }else{
            $r['res']=false;
        }
    }

    echo json_encode($r);

}

?>