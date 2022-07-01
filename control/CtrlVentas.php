<?php

require_once "conexion.php";

class CtrlVentas extends Conexion
{
    private $conexion;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conectar();
    }

    public function listaVentas()
    {
        $sql = "SELECT * FROM ventas";
        $ejecutar = $this->conexion->query($sql);
        $respuesta = $ejecutar->fetchall(PDO::FETCH_ASSOC);
        return $respuesta;
    }

    public function listaVentasCliente($id_cliente)
    {
        $sql = "SELECT * FROM ventas WHERE cliente=" . $id_cliente;
        $ejecutar = $this->conexion->query($sql);
        $respuesta = $ejecutar->fetchall(PDO::FETCH_ASSOC);
        return $respuesta;
    }

    public function crearVenta($id, $productos, $total)
    {
        //crear venta
        $sql = "INSERT INTO ventas(cliente,fecha_venta,total)
                VALUES ($id,now(),$total)";

        $insertar = $this->conexion->prepare($sql);

        $respuestainsertar = $insertar->execute();

        //obtner la ultima venta (id_venta)
        $idUltimaVenta = $this->conexion->lastInsertId();

        //realizar los insert en el detalle
        foreach ($productos as $p) {

            $sql = "INSERT INTO det_ventas(venta,producto,cantidad,subtotal)
             VALUES (?,?,?,?)";
            $insertar = $this->conexion->prepare($sql);

            $arreglodatos = array($idUltimaVenta, $p['id'], $p['cantidad'], $p['subtotal']);
            $respuestainsertar = $insertar->execute($arreglodatos);

            $this->actualizarExistencias($p['id'], $p['cantidad']);
        }
    }

    public function actualizarExistencias($id, $cant_desc)
    {

        $sql = "SELECT existencia FROM productos WHERE id_producto=?";

        $dato = array($id);

        $consulta = $this->conexion->prepare($sql);

        $consulta->execute($dato);

        $resp = $consulta->fetch(PDO::FETCH_ASSOC);

        $existencia_actual = 0;

        if ($resp) {
            $existencia_actual = $resp['existencia'];
        }

        $existencia_actual -= $cant_desc;

        $sql = "UPDATE productos SET existencia=? WHERE id_producto=?";
        $dato = array($existencia_actual, $id);

        $actualizar = $this->conexion->prepare($sql);

        echo $respuestaactualizar = $actualizar->execute($dato);
    }
}
// $CtrlVenta = new CtrlVentas();


// $carrito = $_SESSION['carrito'];
// $total = $_SESSION['total'];

// echo $total;
// print_r($carrito);
// $CtrlVenta->crearVenta($carrito, $total);

// echo "OK venta";
// //remover carrito de compra
// session_destroy();
// //remover total


// header("location:../index.php");
