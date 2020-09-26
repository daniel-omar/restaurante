<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap/css/bootstrap.min.css">
    <script src="<?php echo constant('URL'); ?>public/css/bootstrap-select/css/bootstrap-select.min.css"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo constant('URL'); ?>main">Menú</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo constant('URL'); ?>help">Ayuda</a>
                </li> -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cliente
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo constant('URL'); ?>cliente/nuevo">Nuevo</a>
                    <a class="dropdown-item" href="<?php echo constant('URL'); ?>cliente">Listado</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mesa
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo constant('URL'); ?>mesa/nuevo">Nuevo</a>
                    <a class="dropdown-item" href="<?php echo constant('URL'); ?>mesa">Listado</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pedido
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo constant('URL'); ?>pedido/nuevo">Nuevo</a>
                    <a class="dropdown-item" href="<?php echo constant('URL'); ?>pedido">Listado</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Personal
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo constant('URL'); ?>personal/nuevo">Nuevo</a>
                    <a class="dropdown-item" href="<?php echo constant('URL'); ?>personal">Listado</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Plato
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo constant('URL'); ?>plato/nuevo">Nuevo</a>
                    <a class="dropdown-item" href="<?php echo constant('URL'); ?>plato">Listado</a>
                  </div>
                </li>

            </ul>
        </div>
    </nav>
</body>

</html>
