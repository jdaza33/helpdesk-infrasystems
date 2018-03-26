<?php

require_once("conexion.php");

class cliente extends conexion{

    protected $id;
    protected $identificacion;
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $direccion;
    protected $tipo_cliente;
    protected $id_empresa_base;
    protected $nacimiento;
    protected $foto;
    protected $fecha_registro;

    public function __construct(){
        parent::__construct();
    }

    public function registro(){

    }

    public function consulta(){
        
    }

    public function eliminar(){
        
    }

    public function modificar(){
        
    }


}

?>