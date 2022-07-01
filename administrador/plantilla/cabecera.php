<header>
    <!-- menu de navegacion -->
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">

        <div class="container">
            <a href="index.php" class="navbar-brand">
                <!-- aqui va la imajen de la cabezera -->
                <img src="../imagenes/logo2.jpg" alt="logo"></a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#segundonav"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="segundonav">
                <ul class="navbar-nav m-auto">

                    <li class="nav-item dropdown no-arrow"">
                        <a class=" nav-link dropdown-toggle"  id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion Personas
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>

                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="Personas.php">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                listado personas
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown no-arrow"">
                        <a class=" nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion Clientes
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>

                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="clientes.php">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                listado clientes
                            </a>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#">Gestion Inventarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Gestion Ventas</a></li>
                   
                    <li class="nav-item dropdown no-arrow"">

                        <a class=" nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                            <img class="img-profile rounded-circle" width="30px" src="../imagenes/user.png">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="../sesion.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar Sesion
                            </a>
                        </div>
                    </li>

                </ul>

            </div>

        </div>
    </nav>
</header>
<br><br>
<br><br>