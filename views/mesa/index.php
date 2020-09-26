
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/sweetalert/sweetalert2.min.css">
</head>

<body>
    <?php require "views/header.php"; ?>

    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-md-12 d-flex justify-content-center">
                <h1>LISTADO DE MESAS</h1>
            </div>

        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="table">
                    <table class="table">
                      <thead class="thead-dark">
                          <tr>
                              <th>Codigo</th>
                              <th>Cantidad</th>
                              <th>Ubicacion</th>
                              <th>Fecha Registro</th>
                              <th>Fecha Modificacion</th>
                              <th>Estado</th>
                              <th></th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach ($this->datos as $row) {
                              $mesa = new Mesa();
                              $mesa = $row;
                          ?>
                              <tr>
                                  <td><?php echo $mesa->cod_mesa; ?></td>
                                  <td><?php echo $mesa->cantidad; ?></td>
                                  <td><?php echo $mesa->ubicacion; ?></td>
                                  <td><?php echo $mesa->fecha_registro; ?></td>
                                  <td><?php echo $mesa->fecha_modificacion; ?></td>
                                  <td>
                                      <span class="btn <?php echo $mesa->estado ? "btn-success" : "btn-danger"; ?>">
                                          <?php echo $mesa->estado ? "Habilitado" : "Deshabilitado"; ?>
                                      </span>
                                  </td>
                                  <td><a class="btn btn-warning btn-mini" href="<?php echo constant('URL').'mesa/verMesa/'.$mesa->id_mesa; ?>">Editar</a></td>
                                  <td><button type="button" name="btnElimiar" class="btn btn-danger btn-mini btnEliminar" data-id="<?php echo $mesa->id_mesa; ?>">Eliminar</button></td>
                              </tr>
                          <?php
                          }
                          ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php require "views/footer.php"; ?>

    <script src="<?php echo constant('URL'); ?>public/js/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/assets/pages/js/mesa.js"></script>
</body>

</html>
