
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
                <h2>REGISTRAR PERSONAL</h2>
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
                <form action="<?php echo constant('URL'); ?>personal/registrarPersonal" class="needs-validation" novalidate method="POST">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" class="form-control" name="txtNombre" id="txtNombre" maxlength="50"  required>
                            <div class="invalid-feedback">
                                Por favor introducir Nombre
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="txtApellidoPaterno">Apellido Paterno</label>
                            <input type="text" class="form-control" name="txtApellidoPaterno" id="txtApellidoPaterno" maxlength="50" required>
                            <div class="invalid-feedback">
                                Por favor introducir Apellido Paterno
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="txtApellidoMaterno">Apellido Materno</label>
                            <input type="text" class="form-control" name="txtApellidoMaterno" id="txtApellidoMaterno" maxlength="50" required>
                            <div class="invalid-feedback">
                                Por favor introducir Apellido Materno
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="cboDocumento">Tipo Documento</label>
                            <select class="custom-select" name="cboDocumento" id="cboDocumento" required>
                                <option selected disabled value="">Elegir</option>
                                <option value="DNI">DNI</option>
                                <option value="CEX">CEX</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor elegir Tipo Documento
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="txtNumDocumento">Numero Documento</label>
                            <input type="text" class="form-control" name="txtNumDocumento" id="txtNumDocumento" maxlength="12" required>
                            <div class="invalid-feedback">
                                Pro favor introducir Numero Documento
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cboPersonal">Tipo Personal</label>
                            <select class="custom-select" name="cboPersonal" id="cboPersonal" required>
                                <option selected disabled value="">Elegir</option>
                                <?php
                                foreach ($this->datos as $row) {
                                    $tipo_personal = new Tipo_Personal();
                                    $tipo_personal = $row;
                                ?>
                                  <option value="<?php echo $tipo_personal->id_tipo_personal; ?>"><?php echo $tipo_personal->descripcion; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Por favor elegir Tipo Documento
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-7 mb-3">
                            <label for="txtEmail">Email</label>
                            <input type="text" class="form-control" name="txtEmail" id="txtEmail" >
                            <!-- <div class="valid-feedback">
                                Correcto
                            </div> -->
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="txtTelefono">Telefono</label>
                            <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" maxlength="9">
                            <!-- <div class="valid-feedback">
                                Por favor introducir
                            </div> -->
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
    <script src="<?php echo constant('URL'); ?>public/assets/pages/js/cliente.js"></script>
</body>

</html>
