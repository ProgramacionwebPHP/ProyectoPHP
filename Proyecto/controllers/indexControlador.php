<?php

class ControllerIndex {
    
    public function login($usuario,$contraseña) {
        require_once("models/ControlAcceso.php");
        $services = new Control();
        $con = $this->NTLMHash($contraseña);
        $c = substr($con, 0, 15);
        $datos = $services->login($usuario,$c);
        $result = mysqli_fetch_array($datos);
        if($result == null){
            return "Credenciales incorrectas";
        }
        else{
            if($result['Rol'] == 1 ){
                Header("Location: views/inicioAdmin.php?user=".$result['ID']);
            }else if($result['Rol'] == 0 ){
                Header("Location: views/inicioMedico.php?user=".$result['ID']);
            }else {
                return "Credenciales incorrectas";
            }
        }
    }

    public function ValidarUsuario($nombre) {
        require_once("../models/Usuario.php");
        $services = new Usuario();
        $datos = $services->ValidarUsuario($nombre);
        if($datos != null ){
            return 1;
        }else{
             return 0;
        }
    }

    public function CrearUsuario($nombre, $email, $contraseña){
        require_once("../models/Usuario.php");
        $services = new Usuario();
        $con = $this->NTLMHash($contraseña);
        echo $con;
        $datos = $services->CrearUsuario($nombre, $email, $con);
        if($datos == "Creado" ){
            Header("Location:../index.php");
        }else{
            return "*Hubo un error al crear al usuario";
        }
    }

    function NTLMHash($Input) {
        $Input=iconv('UTF-8','UTF-16LE',$Input);
        $MD4Hash=bin2hex(mhash(MHASH_MD4,$Input));
        $NTLMHash=strtoupper($MD4Hash);
        return($NTLMHash);
      }
}
?>