<?php
include "carrito.php";
require_once "control/CtrlClientes.php";
require_once "control/CtrlAdministrador.php";

$ctrladminitrador = new CtrlAdministrador();
$ctrlclientes = new CtrlClientes();
$mensaje = "";
// validamos si la variable post no viene vacia
if ($_POST)

    // validamos si los campos de usuario y clave vienen vacios
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
        $mensaje = '<div class="alert alert-danger" role="alert">
                    Ingrese su usuario y contraseña
                    </div>';
    } else {
        // en caso  de no estar vacio creamos un objeto de la clase ctrlclientes 

        // asignamos a variables lo que traemos por el metodo post
        $usuario = $_POST['usuario'];
        $clave = md5($_POST['clave']);

        // realizamos una consulta para validar que si exita el usuario y la clave 
        // en la tabla clientes
        $datos = $ctrlclientes->validarCliente($usuario, $clave);

        if ($datos) {
            // si la consulta es verdadera creamos una variable de sesion login
            // y guardamos los datos del cliente
            // $mensaje = $datos['id_cliente'] . "-" . $datos['nick_usuario'] . "-" . $datos['nombres'] . "-" . $datos['apellidos'] . "-" . $datos['correo'];
            session_start();
            
            $_SESSION['login'] = array(
                'tipo_usuario' => 2,
                'id_cliente' => $datos['id_cliente'],
                'persona' => $datos['persona'],
                'nombres' => $datos['nombres'],
                'apellidos' => $datos['apellidos'],
                'nro_doc' => $datos['nro_identificacion'],
                'direccion' => $datos['direccion'],
                'celular' => $datos['celular'],
                'nick' =>  $datos['nick_usuario']
            );
            header("location:index.php");
        } else {

            $datos2 = $ctrladminitrador->validaAdministrador($usuario, $clave);

            if ($datos2) {
                session_start();
                $_SESSION['login'] = array(
                    'tipo_usuario' => 1,
                    'nick' =>  $datos2['nick_usuario']
                );


                header("location:administrador/administrador.php");
            } else {
                $mensaje = '<div class="alert alert-danger" role="alert">
                                 Usuario o contraseña incorrectos
                            </div>';
            }
        }
    }


?>

<!-- INICIO DOCUMENTO HTML -->
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="imagenes/logo.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
</head>

<body>
    <?php include "plantilla/cabecera.php"; ?>

    <div class="container">
        <br>

        <br>
        <div class="row  justify-content-center align-items-center minh-100">
            <div class="col-md-12 text-center">
                <h1>Iniciar sesion</h1>
            </div>
        </div>


        <form method="POST">

            <div class="row  justify-content-center align-items-center">
                <div class="form-group col-md-6 ">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" name="usuario" placeholder="Ingrese su Usuario">
                </div>
            </div>
            <div class="row  justify-content-center align-items-center">
                <div class="form-group col-md-6">
                    <label for="clave">Contraseña</label>
                    <input type="password" class="form-control" name="clave" placeholder="ingrese su contraseña">
                </div>
            </div>


            <div class="row  justify-content-center align-items-center">
                <div class="form-group text-center col-md-6">
                    <?php if ($mensaje != "") {
                        echo  $mensaje;
                    } ?>
                    <a href="Registro.php">Si no tienes cuenta puedes registrarte haciendo clic acá</a>
                </div>
            </div>
            <div class="row  justify-content-center align-items-center">
                <div class="col-md-6">
                    <input type="submit" class="form-control btn btn-primary btn-lg btn-block" value="Ingresar">
                </div>
            </div>
    </div>
    </form>



    <?php include 'plantilla/piepagina.php'; ?>
</body>

</html>