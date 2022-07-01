<?php
session_start();
//validar si es la persona de tipo administrador la que esta ingresando
if (!isset($_SESSION['login'])) {
  header("location:index.php");
} else {
  $login = $_SESSION['login'];
  if ($login['tipo_usuario'] != 1) {
    header("location:index.php");
  }
}

$mensaje = "";
require_once "../control/CtrlClientes.php";
$ctrlclientes = new CtrlClientes();
$clientes = $ctrlclientes->listaClientes();

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!--    Datatables  -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
  <title> Gestion Clientes</title>


</head>

<body>
  <?php include 'plantilla/cabecera.php'; ?>
  

  <h1 class="text-center">Gestion Clientes</h1>
  <br>



  <div class="container">

    <div class="container">
      <div class="row">
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalRegistrar" style="font-size:15px">
          NUEVO <i class='fas fa-user-plus'></i>
        </button>
      </div>
    </div>

    <br>


    <div class="table-responsive">
      <table id="tablaclientes" class="table table-striped table-bordered ">
        <thead class="text-center">
          <th>Id</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Identificacion</th>
          <th>Direccion</th>
          <th>Celular</th>
          <th>Correo</th>
          <th>Nick usuario</th>
          <th>Fecha registro</th>
          <th>Estado</th>
          <th> Accion </th>
        </thead>
        <tbody>
          <?php
          foreach ($clientes as $cliente) {
          ?>
            <tr>
              <td class="text-center"><?php echo $cliente['id_cliente'] ?></td>
              <td class="text-center"><?php echo $cliente['nombres'] ?></td>
              <td class="text-center"><?php echo $cliente['apellidos'] ?></td>
              <td class="text-center"><?php echo $cliente['nro_identificacion'] ?></td>
              <td class="text-center"><?php echo $cliente['direccion'] ?></td>
              <td class="text-center"><?php echo $cliente['celular'] ?></td>
              <td class="text-center"><?php echo $cliente['correo'] ?></td>
              <td class="text-left"><?php echo $cliente['nick_usuario'] ?></td>
              <td class="text-center"><?php echo $cliente['fecha_reg'] ?></td>
              <td class="text-center">
                <?php if ($cliente['estado'] == 1) {
                  echo "activo";
                } else {
                  echo "inactivo";
                }
                ?>

              </td>
              <td width="5%">
                <button class=" btn btn-warning edit_persona" id="idp" type="button" data-toggle="modal" data-target="#modalActualizar" onclick="
                    seleccionar('<?php echo $cliente['id_persona'] ?>',
                               '<?php echo $cliente['nombres'] ?>',
                               '<?php echo $cliente['apellidos'] ?>',
                               '<?php echo $cliente['nro_identificacion'] ?>',
                               '<?php echo $cliente['correo'] ?>',
                               '<?php echo $cliente['celular'] ?>',
                               '<?php echo $cliente['direccion'] ?>',
                               '<?php echo $cliente['estado'] ?>'
                               )">

                  <i class='far fa-edit'></i>
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


  <!-- Ventana modal Actualizar INICIO -->
  <div id="modalActualizar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Editar Persona" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="my-modal-title">Editar Cliente</h4>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" onsubmit="onEnviar()">

            <?php echo $mensaje; ?>

            <div class="row">

              <div class="col-md-12 mb-2">
                <div class="form-group">

                  <input class="form-control" type="hidden" name="cod" id="cod">
                  <label for="nombres">Nombres<b>*</b></label>
                  <input class="form-control" type="text" name="nombres" id="nombres" pattern="^[A-Za-z ]+$" required onkeypress="return validarTexto()">
                </div>
              </div>
              <div class="col-md-12 mb-2">
                <div class="form-group">
                  <label for="apellidos">Apellidos</label>
                  <input class="form-control" type="text" name="apellidos" id="apellidos" pattern="^[A-Za-z ]+$">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="num_doc">Nro. Documento</label>
                  <input class="form-control" type="text" name="num_doc" id="num_doc" required disabled onkeypress='return validaNumeros(event)'>
                </div>
              </div>

              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="correo">Correo</label>
                  <input class="form-control" type="email" name="correo" id="correo" disabled placeholder="tucorreo@jemplo.com" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="celular">Celular</label>
                  <input class="form-control" type="text" name="celular" id="celular" onkeypress='return validaNumeros(event)'>
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="direccion">Direccion<b>*</b></label>
                  <input class="form-control" type="text" name="direccion" id="direccion" required>

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-2">
                <div class="form-group">
                  <label for="estado">Estado</label>

                  <select class="form-control" name="estado" id="estado">
                    <option value="1">activo</option>
                    <option value="0">inactivo</option>
                  </select>

                </div>
              </div>
            </div>

            <input class="form-control" type="hidden" name="accion" id="accion" value="1">

            <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar</button>

          </form>

        </div>
        <div class="modal-footer">

          <button class="btn btn-danger" type="button" data-dismiss="modal">
            Cancelar
          </button>
        </div>

      </div>
    </div>
  </div>
  <!-- Ventana modal FIN -->

  <!-- Ventana modal Registrar INICIO -->
  <div id="modalRegistrar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Editar Persona" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="my-modal-title">Nuevo Cliente</h4>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" onsubmit="onEnviar()">

            <?php echo $mensaje; ?>

            <div class="row">

              <div class="col-md-12 mb-2">
                <div class="form-group">
                  <input class="form-control" type="hidden" name="cod" id="cod">
                  <label for="nombres">Nombres<b>*</b></label>
                  <input class="form-control" type="text" name="nombres" id="nombres" pattern="^[A-Za-z ]+$" required onkeypress="return validarTexto()">
                </div>
              </div>
              <div class="col-md-12 mb-2">
                <div class="form-group">
                  <label for="apellidos">Apellidos</label>
                  <input class="form-control" type="text" name="apellidos" id="apellidos" pattern="^[A-Za-z ]+$">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="num_doc">Nro. Documento<b>*</b></label>
                  <input class="form-control" type="text" name="num_doc" id="num_doc" required onkeypress='return validaNumeros(event)'>
                </div>
              </div>

              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="correo">Correo<b>*</b></label>
                  <input class="form-control" type="email" name="correo" id="correo" placeholder="tucorreo@jemplo.com" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="celular">Celular</label>
                  <input class="form-control" type="text" name="celular" id="celular" onkeypress='return validaNumeros(event)'>
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="direccion">Direccion<b>*</b></label>
                  <input class="form-control" type="text" name="direccion" id="direccion" required>
                </div>
              </div>
            </div>
            <input class="form-control" type="hidden" name="accion" id="accion" value="2">


            <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>

          </form>

        </div>
        <div class="modal-footer">

          <button class="btn btn-danger" type="button" data-dismiss="modal">
            Cancelar
          </button>
        </div>

      </div>
    </div>
  </div>
  <!-- Ventana modal FIN -->



  <?php include 'plantilla/piepagina.php'; ?>
  <!--    Datatables-->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>


  <script>
    $(document).ready(function() {
      $('#tablaclientes').DataTable({
        languaje: {
          url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
        }
      });
    });
  </script>


</body>

</html>