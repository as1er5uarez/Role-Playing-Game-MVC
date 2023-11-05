<?php
// Analizo la sesión
require_once(dirname(__FILE__) . '/../../../../utils/SessionUtils.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Artean</title>
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../../../../index.php"><img src="../../../../assets/img/small-logo.png" alt="" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a  class="nav-link " href="../../public/views/user/logout.php">Salir</a>
                    </li>
                </ul>
                <?php
                if (SessionUtils::loggedIn())
                    echo "<span class='badge badge-success  '> Has iniciado sesión: " . $_SESSION['user'] . "</span>";
                else {
                    // En caso de no estar registrado redirigimos a la visualización pública
                    header('Location: ../../public/views/index.php');
                }
                ?>
            </div>  
        </nav>
    <!-- Page Content -->
        <div class="container">
            <form class="form-horizontal" method="post" action="../../../controllers/locoche/insertController.php">

                <div class="form-group">
                    <label for="company" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="title" placeholder="Cupra Leon FR" value="">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="position" class="col-sm-2 control-label">Descripción</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" placeholder="SUV" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="function" class="col-sm-2 control-label">Marca</label>
                    <div class="col-sm-10">
                        <input type="textbox" class="form-control" id="brand" name="brand" placeholder="SEAT" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="function" class="col-sm-2 control-label">Potencia</label>
                    <div class="col-sm-10">
                        <input type="textbox" class="form-control" id="power" name="power" placeholder="150CV" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="function" class="col-sm-2 control-label">Vida util</label>
                    <div class="col-sm-10">
                        <input type="textbox" class="form-control" id="lifeLevel" name="lifeLevel" placeholder="Años" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="function" class="col-sm-2 control-label">Vehiculo</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="avatar" name="avatar" placeholder="SEAT" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="function" class="col-sm-2 control-label">Modelo</label>
                    <div class="col-sm-10">
                        <input type="textbox" class="form-control" id="model" name="model" placeholder="FR" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Agregar vehiculo</button>
                    </div>
                </div>
            </form>
            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; A. S. 2023</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /.container -->
        <!-- Java Script Boostrap-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" ></script>
    </body>
</html>


