<?php

require_once "../conexion/conexion.php";
// if (!isset($_SESSION['login'])) {
//   header("location:index.php");
// } else {
//   $login = $_SESSION['login'];
//   if ($login['tipo_usuario'] == 2) {
//     header("location:index.php");
//   }
// }
require_once "../control/CtrlProductos.php";
$controlproductos = new CtrlProductos();
$productos=$controlproductos->listaProductos();

?>


<!doctype html>
<html lang="en">
  <head>
     <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Datatables   -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    
    <title></title>
    <style>
        table.dataTable thead {
            background: linear-gradient(to right, black, #00F260);
            color:white;
        }
    </style>  
      
  </head>
  <body>

 
        <h1 class="text-center">Inventario de Productos</h1>
          
        <h3 class="text-center">Inventario Productos<span style="color: #339CFF;">Tienda Sisposw TPS 97 2020</span></h3>
        
        <div class="container">
           <div class="row">
               <div class="col-lg-12">
                <table id="tablaproductos" class="table-striped table-bordered" style="width:100%">
                    <thead class="text-center">
                        <th>Id_Producto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                        <th>Stock</th>
                        <th>Existencia</th>
                        
                    </thead>
                    <tbody>
                        <?php
                            foreach($productos as $producto){
                        ?>
                        <tr>
                            <td><?php echo $producto['id_producto']?></td>
                            <td><?php echo $producto['nombre']?></td>
                            <td><?php echo $producto['precio']?></td>
                            <td><?php echo $producto['categoria']?></td>
                            <td><?php echo $producto['marca']?></td>
                            <td><?php echo $producto['stock']?></td>
                            <td><?php echo $producto['existencia']?></td>
                            <td width="5%">
                                    <form action="" method="POST">
                                        <input type="hidden" name="indice" value="<?php echo $i ?>">
                                        <button class=" btn btn-primary" type="submit" name="btnEditar" value="Editar">Editar</button>
                                        <!-- <a class="btn btn-danger" name="btnAccion" value="Eliminar" href="carrito.php?in=<?php// echo $i ?>">Eliminar</a> -->
                                    </form>
                                </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
               </div>
           </div> 
        </div>

   
                                
    

     <!-- Optional JavaScript 
     jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      
      
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
      
    <script>
      $(document).ready(function(){
         $('#tablaproductos').DataTable(); 
      });
    </script>
      
      
  </body>
</html>