<?php

require_once("login.php");

$op=$_GET['op'];

if($op==1){
    login();
}

function login(){

    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];

    $login=new login();
    $res=$login->consulta($usuario, $clave);
    if($res==true){
        $respuesta['res']=1;
        echo json_encode($respuesta);
    }else{
        $respuesta['res']=0;
        echo json_encode($respuesta);
    }

} 

?>