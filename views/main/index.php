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
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">Bienvenido al menu principal</h1>
                    <a class="btn btn-primary btn-lg" href="<?php echo constant('URL'); ?>nuevo" role="button">Registrar Alumno</a>
                </div>
            </div>
        </div>
    </div>
    <?php require "views/footer.php"; ?>
</body>

</html>