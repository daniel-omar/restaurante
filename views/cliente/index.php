<!DOCTYPE html>
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
                <h1>LISTADO DE CLIENTES</h1>
            </div>

        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="table">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Numero Documento</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->datos as $row) {
                                $cliente = new Cliente();
                                $cliente = $row;
                            ?>
                                <tr>
                                    <td><?php echo $cliente->nombre; ?></td>
                                    <td><?php echo $cliente->apellido_paterno; ?></td>
                                    <td><?php echo $cliente->apellido_materno; ?></td>
                                    <td><?php echo $cliente->numero_documento; ?></td>
                                    <td><?php echo $cliente->email; ?></td>
                                    <td><?php echo $cliente->telefono; ?></td>
                                    <td><a class="btn btn-warning btn-mini" href="<?php echo constant('URL').'cliente/verCliente/'.$cliente->id_cliente; ?>">Editar</a></td>
                                    <td><button type="button" name="btnElimiar" class="btn btn-danger btn-mini btnEliminar" data-id="<?php echo $cliente->id_cliente; ?>">Eliminar</button></td>
                                    <!-- <td><a class="btn btn-danger btn-mini" id="btnEliminar" href="<?php //echo constant('URL').'cliente/eliminar'.$cliente->id_cliente; ?>">Eliminar</a></td> -->
                                    <!-- <?php //$estado = $cliente->estado; ?>
                                    <td>
                                        <span class="btn <?php //echo $alumno->estado ? "btn-success" : "btn-danger"; ?>">
                                            <?//php echo $alumno->estado ? "Habilitado" : "Deshabilitado"; ?>
                                        </span>
                                    </td> -->
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
    <!-- <?php
            //var_dump($this->datos);
            ?> -->
    <?php require "views/footer.php"; ?>

    <script src="<?php echo constant('URL'); ?>public/js/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/assets/pages/js/cliente.js"></script>
</body>

</html>
