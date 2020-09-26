<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require "views/header.php"; ?>

    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-md-12 d-flex justify-content-center">
                <h1>LISTADO DE ALUMNOS</h1>
            </div>

        </div>
        <div class="row mt-2>
            <div class="col-md-12">
                <div class="table">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Direccion</th>
                                <th>Edad</th>
                                <th>Ciclo</th>
                                <th>Email</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->datos as $row) {
                                $alumno = new Alumno();
                                $alumno = $row;
                            ?>
                                <tr>
                                    <td><?php echo $alumno->nombre; ?></td>
                                    <td><?php echo $alumno->apellidos; ?></td>
                                    <td><?php echo $alumno->direccion; ?></td>
                                    <td><?php echo $alumno->edad; ?></td>
                                    <td><?php echo $alumno->ciclo; ?></td>
                                    <td><?php echo $alumno->email; ?></td>
                                    <?php $estado = $alumno->estado; ?>
                                    <td>
                                        <span class="btn <?php echo $alumno->estado ? "btn-success" : "btn-danger"; ?>">
                                            <?php echo $alumno->estado ? "Habilitado" : "Deshabilitado"; ?>
                                        </span>
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
    </div>
    <!-- <?php
            var_dump($this->datos);
            ?> -->
    <?php require "views/footer.php"; ?>

</body>

</html>