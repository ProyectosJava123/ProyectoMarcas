<?php
include("conexion.php");
$con = conectar();
$id_usuario = $_POST['id_usuario'];
$id_encuesta = $_POST['id_encuesta'];
$resultUsuario = select($con, "usuario", "WHERE id_usuario =".$id_usuario);
if($resultUsuario->num_rows > 0){
    $usuario = $resultUsuario->fetch_array(MYSQLI_ASSOC);
}
$resultEncuestas = select($con, "encuesta", "WHERE id_encuesta=".$id_encuesta);
if($resultEncuestas->num_rows > 0){
    $encuesta = $resultEncuestas->fetch_array(MYSQLI_ASSOC);
}
$resultPreguntas = select($con, "pregunta", "WHERE fk_encuesta=".$id_encuesta);
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
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:postListaEncuestas();">Lista de encuestas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:postNuevaEncuesta();">Nueva encuesta</a>
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
                    <div class="col-sm-12">
                    <h1><?php echo $encuesta['nombre'] ?></h1>
                    </div>    
                    <div class="col-sm-12">    
                    <hr> 
                    <form action="eliminar_encuesta.php" method="post" id="eliminar" >
                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                        <button type="submit" name="id_encuesta" value="<?php echo $id_encuesta ?>"  class="btn btn-warning"><stron>Eliminar encuesta</stron></button>
                    </form>
                    <hr>
                    </div>    
                    <?php 
    if($resultPreguntas->num_rows > 0){
        while($row = mysqli_fetch_array($resultPreguntas, MYSQLI_ASSOC)){
                    ?>
                    <div class="col-sm-12">
                        <h3><?php echo $row['texto'] ?></h3>
                        <br>
                        <p><strong>Muy satisfecho:</strong> <?php echo getVeces($con, $row['id_pregunta'], "Muy satisfecho")?></p>
                        <p><strong>Satisfecho:</strong> <?php echo getVeces($con, $row['id_pregunta'], "Satisfecho")?></p>
                        <p><strong>Indiferente:</strong> <?php echo getVeces($con, $row['id_pregunta'], "Indiferente")?></p>
                        <p><strong>Decepcionado:</strong> <?php echo getVeces($con, $row['id_pregunta'], "Decepcionado")?></p>
                        <p><strong>Muy decepcionado:</strong> <?php echo getVeces($con, $row['id_pregunta'], "Muy decepcionado")?></p>

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

        <form action="lista_encuestas_admin.php" method="post" id="f2" >
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
        </form>

        <form action="nueva_encuesta.php" method="post" id="f3" >
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
        </form>

        <script type="text/javascript">

            function postListaEncuestas(){
                document.getElementById('f2').submit(); 
            }

            function postNuevaEncuesta(){
                document.getElementById('f3').submit(); 
            }

        </script>



        <!-- Bootstrap core JavaScript
================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


    </body>
</html>