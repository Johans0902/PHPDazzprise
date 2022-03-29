<?php

class Login {
    private $usuario;
    private $clave;

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function setClave($clave){
        $this->clave = $clave;
    }

    public function loginUser(){
        require "../controller/config/conexion.php";
        $this->clave = md5( $this->clave);
        $sql = "SELECT * FROM usuarios WHERE usuario = '$this->usuario' AND clave ='$this->clave'";

        $result = $conexion->query($sql);

        $numRows = $result->num_rows;
        if($numRows == 1){
            return true;
        }

        return false;
    }
}

?>