<?php
require_once "conexion.php";

class CtrlAdministrador extends Conexion
{
    
    private $conexion = null;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conectar();
    }

    // public function listaAdministrador()
    // {
    //     $sql = "SELECT * FROM adminitrador";
    //     $ejecutar = $this->conexion->query($sql);
    //     $respuesta = $ejecutar->fetchall(PDO::FETCH_ASSOC);
    //     return $respuesta;
    // }
   
    // se agrego una nueva funcion para validar el login
    public function validaAdministrador(String $usuario, String $clave){
        $sql = "SELECT nick_usuario FROM administrador WHERE  nick_usuario=? AND clave=?";
        $dato = array($usuario,$clave);

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute($dato);
        $respuesta = $consulta->fetch(PDO::FETCH_ASSOC);
        return $respuesta;
    }

}

?>
