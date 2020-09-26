
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require "views/header.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mt-2">
                <h2>REGISTRAR MESA</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-2">
                <?php
                if ($this->mensaje != "") {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->mensaje; ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <form action="<?php echo constant('URL'); ?>mesa/registrarMesa" class="needs-validation" novalidate method="POST">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="txtCodigo">Cod Mesa</label>
                            <input type="text" class="form-control" name="txtCodigo" id="txtCodigo" maxlength="50"  required>
                            <div class="invalid-feedback">
                                Por favor introducir cod mesa
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="txtCantidad">Cantidad</label>
                            <input type="number" class="form-control" name="txtCantidad" id="txtCantidad" maxlength="50" required>
                            <div class="invalid-feedback">
                                Por favor introducir Cantidad
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="txtUbicacion">Ubicacion</label>
                            <input type="text" class="form-control" name="txtUbicacion" id="txtUbicacion" maxlength="50" required>
                            <div class="invalid-feedback">
                                Por favor introducir ubicacion
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Estoy de acuerdo con los termios y condiciones
                            </label>
                            <div class="invalid-feedback">
                                Debes estar de acuerdo antes de registrarte
                            </div>
                        </div>
                    </div> -->
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>
    <?php require "views/footer.php"; ?>
    <script src="<?php echo constant('URL'); ?>public/assets/pages/js/mesa.js"></script>
</body>

</html>
