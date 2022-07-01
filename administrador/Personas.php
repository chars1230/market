<?php
session_start();
require_once "../control/CtrlPersonas.php";
$controlpersona = new CtrlPersonas();
$personas = $controlpersona->listaPersonas();
$mensaje = "";

if (!isset($_SESSION['login'])) {
  header("location:index.php");
} else {
  $login = $_SESSION['login'];
  if ($login['tipo_usuario'] != 1) {
    header("location:index.php");
  }
}

if (
  !empty($_POST['nombres'])
  || !empty($_POST['apellidos'])
  || !empty($_POST['cod'])
  || !empty($_POST['num_doc'])
  || !empty($_POST['correo'])
  || !empty($_POST['telefono'])
  || !empty($_POST['direccion'])
  || !empty($_POST['accion'])

) {
  $id = $_POST['cod'];
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $num_doc = $_POST['num_doc'];
  $correo = $_POST['correo'];
  $celular = $_POST['celular'];
  $direccion = $_POST['direccion'];

  $accion = $_POST['accion'];


  echo  "<script>alert('$id,$nombres,$apellidos,$num_doc,$direccion,$celular,$correo,$accion')</script>";

  if ($accion == 1) {
    echo $accion;
    
    $actualizar = $controlpersona->actualizarPersona($id, $nombres, $apellidos, $num_doc, $direccion, $celular, $correo);

    if (!$actualizar) {
      header("location:Personas.php");
    } else {
      echo "<script>alert('Error al actualizar persona')</script>";
    }
  } else {
    $registrar = $controlpersona->insertarPersona($nombres, $apellidos, $num_doc, $direccion, $celular, $correo);
    if ($registrar) {
      header("location:Personas.php");
    } else {
      echo "<script>alert('Error al registrar persona')</script>";
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <link rel="icon" type="image/png" href="../imagenes/logo.jpg">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!--    Datatables  -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Gestion Personas </title>
</head>

<body>

  <?php include 'plantilla/cabecera.php'; ?>
  <br><br>

  <div class="container">
    <h1 class="text-center"> Gestion Personas</h1>
    <br>

    <div class="container">
      <div class="row">
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalRegistrar" style="font-size:15px">
          NUEVO <i class='fas fa-user-plus'></i>
        </button>
      </div>
    </div>

    <br>

    <div class="table-responsive">
      <table id="tablapersonas" class="table table-striped table-bordered ">
        <thead class="text-center">
          <th>Id</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Identificacion</th>
          <th>Direccion</th>
          <th>Celular</th>
          <th>Correo</th>
          <th> Accion </th>
        </thead>
        <tbody>
          <?php
          foreach ($personas as $persona) {
          ?>
            <tr>
              <td><?php echo $persona['id_persona'] ?></td>
              <td><?php echo $persona['nombres'] ?></td>
              <td><?php echo $persona['apellidos'] ?></td>
              <td><?php echo $persona['nro_identificacion'] ?></td>
              <td><?php echo $persona['direccion'] ?></td>
              <td><?php echo $persona['celular'] ?></td>
              <td><?php echo $persona['correo'] ?></td>
              <td width="5%">
                <button class=" btn btn-warning "  type="button" data-toggle="modal" data-target="#modalActualizar" onclick="
                    seleccionar('<?php echo $persona['id_persona'] ?>',
                               '<?php echo $persona['nombres'] ?>',
                               '<?php echo $persona['apellidos'] ?>',
                               '<?php echo $persona['nro_identificacion'] ?>',
                               '<?php echo $persona['correo'] ?>',
                               '<?php echo $persona['celular'] ?>',
                               '<?php echo $persona['direccion'] ?>'
                               )">

                  <i class='far fa-edit'></i>
                </button>
              </td>
              <!-- <td width="5%">
              <button class=" btn btn-danger" type="submit" name="btnAccion">Inactivar</button>
            </td> -->
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
          <h4 class="modal-title" id="my-modal-title">Editar Persona</h4>
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
                  <label for="nombres">Nombres</label>
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
                  <input class="form-control" type="text" name="num_doc" id="num_doc"  onkeypress='return validaNumeros(event)' required>
                </div>
              </div>

              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="correo">Correo</label>
                  <input class="form-control" type="email" name="correo" id="correo"  placeholder="tucorreo@jemplo.com" required>
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
                  <label for="direccion">Direccion</label>
                  <input class="form-control" type="text" name="direccion" id="direccion" required>
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
          <h4 class="modal-title" id="my-modal-title">Registrar Persona</h4>
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

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#tablapersonas').DataTable();
    });
  </script>
</body>

</html>