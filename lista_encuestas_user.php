<?php
include("conexion.php");
$con = conectar();
$id_usuario = $_POST['id_usuario'];
$resultUsuario = select($con, "usuario", "WHERE id_usuario =".$id_usuario);
if($resultUsuario->num_rows > 0){
    $usuario = $resultUsuario->fetch_array(MYSQLI_ASSOC);
}
$resultEncuestas = select($con, "encuesta", "");
?>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Starter Template for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <style type="text/css">
            body {
                padding-top: 5rem;
            }

            .starter-template {
                padding: 3rem 1.5rem;
                text-align: center;
            }
        </style>
    </head>


    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#"><?php echo $usuario['nick'] ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Lista de encuestas<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Cerrar sesion</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="container">

            <div class="col-md-12 container-fluid ">
                        <div class="row">
                            <?php 
                            if($resultEncuestas->num_rows > 0){
                                while($row = mysqli_fetch_array($resultEncuestas, MYSQLI_ASSOC)){

                            ?>
                            <div class="col-sm-12">
                                <div class="encuestac">
                                    <h3><?php echo $row['nombre'] ?></h3>
                                    <form class="hiddenform" method="post" action="responder_encuesta.php">
                                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                                        <button type="submit" name="id_encuesta" value="<?php echo $row['id_encuesta'] ?>"  class="btn btn-primary">Contestar</button>
                                    </form>
                                </div>
                                <hr>
                            </div>
                            <?php 
                                }
                            }
                            ?>
                        </div>
                    </div>

        </main>
        <!-- /.container -->

       

        <!-- Bootstrap core JavaScript
================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


    </body>
</html>