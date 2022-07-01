<?php
session_start();
require_once "control/CtrlVentas.php";

if (!isset($_SESSION['login'])) {
  header("location:login.php");
}

$login = $_SESSION['login'];
$id_cliente = $login['id_cliente'];

$CtrlVentas = new CtrlVentas();
$historial = $CtrlVentas->listaVentasCliente($id_cliente);




?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <link rel="icon" type="image/png" href="imagenes/logo.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <title>Historial Compras</title>
</head>

<body>

  <?php include 'plantilla/cabecera.php'; ?>
  <br><br>
  <h2 class="display-4 text-center">Historial Compras</h2>
  <br><br>
  <!-- <?php //print_r($historial); ?> -->
  <div class="table-responsive">
    <div class="container">
      <table id="tablacompras" class="table table-striped table-bordered">
        <thead class="text-center">
          <th>ID</th>
          <th>Fecha Compra</th>
          <th>Metodo Pago</th>
          <th>Total</th>
          <th>Detalle</th>
        </thead>
        <tbody>
          <?php
          foreach ($historial as $venta) {
          ?>
            <tr>
              <td width="5%" class="text-center"><?php echo $venta['id_venta'] ?></td>
              <td width="20%" class="text-center"><?php echo $venta['fecha_venta'] ?></td>
              <td width="20%" class="text-center"><?php echo $venta['metodo_pag'] ?></td>
              <td width="20%"class="text-center">$<?php echo $venta['total'] ?></td>

              <td width="10% text-center" align="center">
                <button class=" btn btn-success " type="button" data-toggle="modal" data-target="#modalActualizar">
                  <b>ver</b>
                  <i class='fas fa-eye'></i>
                </button>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>

    </div>
  </div>
  <?php include 'plantilla/piepagina.php'; ?>







</body>

</html>