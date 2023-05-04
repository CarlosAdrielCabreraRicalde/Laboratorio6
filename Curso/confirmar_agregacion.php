<?php
include('../conexion.php');
$nombre_curso=$_POST['nombre_curso'];
$creditos=$_POST['creditos'];
$conexion=conectar();
$sql="INSERT INTO curso (nombre_curso,creditos) VALUES ('$nombre_curso','$creditos')";
$resultado=mysqli_query($conexion,$sql);
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1>Nuevo Curso</h1>
        <div>
           <?php
           if (!$resultado) {
            echo '<div class="alert alert-danger" role="alert">';
            echo 'El curso nuevo no se ha podido agregar';
            echo '</div>';
           }else{
            echo '<div class="alert alert-success" role="alert">';
            echo 'Se agrego correctamente el curso nuevo';
            echo '</div>';
           }
           ?>
        </div>
        <div class="container text-center">
            <a href="cursos.php" class="btn btn-success mt-3">Volver</a>
        </div>
    </div>
</body>
</html>