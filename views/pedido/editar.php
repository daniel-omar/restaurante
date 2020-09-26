
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
                <h2>EDITAR CLIENTE</h2>
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
                <form action="<?php echo constant('URL'); ?>cliente/actualizarCliente" class="needs-validation" novalidate method="POST">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $this->cliente->nombre; ?>" required>
                            <div class="invalid-feedback">
                                Por favor introducir Nombre
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="txtApellidoPaterno">Apellido Paterno</label>
                            <input type="text" class="form-control" name="txtApellidoPaterno" id="txtApellidoPaterno" value="<?php echo $this->cliente->apellido_paterno; ?>" required>
                            <div class="invalid-feedback">
                                Por favor introducir Apellido Paterno
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="txtApellidoMaterno">Apellido Materno</label>
                            <input type="text" class="form-control" name="txtApellidoMaterno" id="txtApellidoMaterno" value="<?php echo $this->cliente->apellido_materno; ?>" required>
                            <div class="invalid-feedback">
                                Por favor introducir Apellido Materno
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="cboDocumento">Tipo Documento</label>
                            <select class="custom-select" name="cboDocumento" id="cboDocumento" required >
                                <option selected disabled value="">Elegir</option>
                                <option value="DNI" <?php  if($this->cliente->tipo_documento=="DNI") echo "selected"; ?>>DNI</option>
                                <option value="CEX" <?php  if($this->cliente->tipo_documento=="CEX") echo "selected"; ?>>CEX</option>
                                <option value="PASAPORTE" <?php if($this->cliente->tipo_documento=="PASAPORTE") echo "selected"; ?>>PASAPORTE</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor elegir Tipo Documento
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="txtNumDocumento">Numero Documento</label>
                            <input type="text" class="form-control" name="txtNumDocumento" id="txtNumDocumento" value="<?php echo $this->cliente->numero_documento; ?>" required>
                            <div class="invalid-feedback">
                                Pro favor introducir Numero Documento
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="txtEmail">Email</label>
                            <input type="text" class="form-control" name="txtEmail" id="txtEmail" value="<?php echo $this->cliente->email; ?>" >
                            <!-- <div class="valid-feedback">
                                Correcto
                            </div> -->
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="txtTelefono">Telefono</label>
                            <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" value="<?php echo $this->cliente->telefono; ?>">
                            <!-- <div class="valid-feedback">
                                Por favor introducir
                            </div> -->
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="txtObservacion">Observaciones</label>
                            <input type="text" class="form-control" name="txtObservacion" id="txtObservacion" value="<?php echo $this->cliente->observacion; ?>">
                            <!-- <div class="valid-feedback">
                                Pro favor Introducir Obseervacion
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
                    <button class="btn btn-success" type="submit">Actualizar</button>
                    <a class="btn btn-danger" href="<?php echo constant('URL').'cliente'; ?>">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <?php require "views/footer.php"; ?>
    <script src="<?php echo constant('URL'); ?>public/assets/pages/js/cliente.js"></script>
</body>

</html>
