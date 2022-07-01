<header>

    <!-- menu de navegacion -->
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">

        <div class="container">
            <a href="index.php" class="navbar-brand">
                <!-- aqui va la imajen de la cabezera -->
                <img src="imagenes/logo2.jpg" alt="logo"></a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#segundonav"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="segundonav">
                <ul class="navbar-nav m-auto">



                    <li class="nav-item"><a class="nav-link" href="#">Categorias</a></li>
                

                    <li class="nav-item">
                        <a href="listaCarrito.php" class="nav-link">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            Carrito(<?php echo (empty($_SESSION['carrito'])) ? 0 : count($_SESSION['carrito']); ?>)
                        </a>
                    </li>


                    <!-- Validar si existe un avariable de sesion login -->
                    <?php
                    if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link">Iniciar Sesion</a></li>';
                    } else {
                        $login = $_SESSION['login'];
                        
                        echo '
                        
                        <li class="nav-item dropdown no-arrow"">
                           
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ' .$login['nick']. '
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                 <img class="img-profile rounded-circle" width="30px" src="imagenes/user.png">    
                            </a> 

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="ActualizarDatos.php">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Perfil
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="HistorialCompras.php">
                                    <i class="fa fa-history text-gray-400"></i>
                                       
                                        Historial compras
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="sesion.php"  >
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Cerrar Sesión
                                    </a>
                            </div>
                        </li>';
                    }
                    ?>

                    <!-- <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                           <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
                            <!-- <img class="img-profile rounded-circle" src="img/user.png">
                        </a> -->
                        <!-- Dropdown - User Information -->
                        
                    <!-- </li>  --> 


                </ul>
                <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Buscar">
                    <button class="btn btn-outline-success" type="button">Buscar</button>
                </form>
            </div>

        </div>
    </nav>



    <br><br>
</header>