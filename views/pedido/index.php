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
                <h1>LISTADO DE PEDIDOS</h1>
            </div>

        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="table">
                    <table class="table">
                      <thead class="thead-dark">
                          <tr>
                              <th>Pedido</th>
                              <th>Cliente</th>
                              <th>Mesa</th>
                              <th>Camarero</th>
                              <th>Fecha Registro</th>
                              <th></th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach ($this->datos as $row) {
                              $pedido = new Pedido();
                              $pedido = $row;
                          ?>
                              <tr>
                                  <td><?php echo $pedido->id_pedido; ?></td>
                                  <td><?php echo $item->cliente->nombre.' '.$item->cliente->apellido_paterno.' '.$item->cliente->apellido_materno; ?></td>
                                  <td><?php echo $pedido->mesa->cod_mesa; ?></td>
                                  <td><?php echo $item->personal->nombre.' '.$item->personal->apellido_paterno.' '.$item->personal->apellido_materno; ?></td>
                                  <td><?php echo $pedido->fecha_registro; ?></td>
                                  <!-- <td><a class="btn btn-warning btn-mini" href="<?php //echo constant('URL').'cliente/verCliente/'.$pedido->id_pedido; ?>">Registrar Venta</a></td> -->
                                  <!-- <td><button type="button" name="btnElimiar" class="btn btn-danger btn-mini btnEliminar" data-id="<?php //echo $mesa->id_mesa; ?>">Eliminar</button></td> -->
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
