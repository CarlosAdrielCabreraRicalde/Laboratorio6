<?php
include('../conexion.php');
$conexion=conectar();

$alumno_id = $_POST['alumno_id'];
$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];

$sql = "UPDATE alumno SET nombres='$nombres', ape_paterno='$ape_paterno', ape_materno='$ape_materno' WHERE alumno_id='$alumno_id'";

$resultado = mysqli_query($conexion, $sql);

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
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Alumno</title>
    </head>
    <body>
        <div class="container">
        <h1>Actualizar Alumno</h1>
        <h3>
            <?php
            if(!$resultado){
                echo '<div class="alert alert-danger" role="alert">';
                echo 'Los datos no se pudieron actualizar';
                echo '</div>';
            }
            else{
                echo '<div class="alert alert-success" role="alert">';
                echo 'Actualización hecha';
                echo '</div>';
            }
            ?>
        </h3>
        <a href="alumnos.php" class="btn btn-success">Volver</a>
        </div>
    </body>
    </html>
</body>
</html>