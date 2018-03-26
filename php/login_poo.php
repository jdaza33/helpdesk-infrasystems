<?php

require_once("conexion.php");

class login extends conexion{

    protected $id;
    protected $id_admin_cliente;
    protected $usuario;
    protected $clave;
    protected $rol;

    public function __construct(){
        parent::__construct();
    }

    public function registro(){

    }

    public function consulta($usuario, $clave){

        $sql="SELECT * FROM login WHERE usuario='$usuario' AND clave='".md5($clave)."'";
        $res = $this->db->query($sql);
        $aux=$res->fetch_all(MYSQLI_ASSOC);
        $respuesta['res']=false;
        if($aux){
            //header("location:../index.php");
            return true;
        }else{
            return true;
            /*echo "<script>";
            echo "notificacion('Usuario o clave invalida',1);";
            echo "</script>";*/
        }
        
    }

    public function eliminar(){
        
    }

    public function modificar(){
        
    }


}

?>