
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
                <h2>EDITAR PLATO</h2>
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
                <form action="<?php echo constant('URL'); ?>plato/actualizarPlato" class="needs-validation" novalidate method="POST">
                  <div class="form-row">
                      <div class="col-md-8 mb-3">
                          <label for="txtDescripcion">Descripcion</label>
                          <input type="text" class="form-control" name="txtDescripcion" id="txtDescripcion" maxlength="50" value="<?php echo $this->plato->descripcion; ?>"  required>
                          <div class="invalid-feedback">
                              Por favor introducir Descripcion
                          </div>
                      </div>

                  </div>
                  <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <label for="txtPrecio">Precio</label>
                        <input type="text" class="form-control" name="txtPrecio" id="txtPrecio" maxlength="50" value="<?php echo $this->plato->precio; ?>" required>
                        <div class="invalid-feedback">
                            Por favor introducir Precio
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="txtStock">Stock</label>
                        <input type="number" class="form-control" name="txtStock" id="txtStock" maxlength="50" value="<?php echo $this->plato->stock; ?>" required>
                        <div class="invalid-feedback">
                            Por favor introducir Stock
                        </div>
                    </div>
                  </div>
                    <button class="btn btn-success" type="submit">Actualizar</button>
                    <a class="btn btn-danger" href="<?php echo constant('URL').'plato'; ?>">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <?php require "views/footer.php"; ?>
    <script src="<?php echo constant('URL'); ?>public/assets/pages/js/cliente.js"></script>
</body>

</html>
