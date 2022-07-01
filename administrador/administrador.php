<?php
session_start();
// require_once "conexion.php";
// validar si hay una sesion activa
if (!isset($_SESSION['login'])) {
  header("location:../index.php");
} else {
  $login = $_SESSION['login'];
  if ($login['tipo_usuario'] == 2) {
    header("location:../index.php");
  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="icon" type="image/png" href="../imagenes/logo.jpg">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
</head>

<body>
  <?php include 'plantilla/cabecera.php'; ?>
  <br><br>
  <h1 class="display-4 text-center">Bienvenido</h1>

  <?php include 'plantilla/piepagina.php'; ?>
</body>

</html>