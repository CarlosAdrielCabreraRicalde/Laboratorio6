<?php
include('../conexion.php');
$nombres=$_POST['nombres'];
$ape_paterno=$_POST['ape_paterno'];
$ape_materno=$_POST['ape_materno'];
$conexion=conectar();
$sql="INSERT INTO alumno (nombres,ape_paterno,ape_materno) VALUES ('$nombres','$ape_paterno','$ape_materno')";

//Ejecutamos

$resultado=mysqli_query($conexion,$sql);


//Desconectamos
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
        <title>Agregue un alumno</title>
    </head>
    <body>
        <div class="container">
        <h1>Alumno Nuevo</h1>
        <h3>
            <?php
            if(!$resultado){
                echo '<div class="alert alert-danger" role="alert">';
                echo 'No fue posible registrar al alumno. Intentelo de nuevo';
                echo '</div>';
            }
            else{
                echo '<div class="alert alert-success" role="alert">';
                echo 'El alumno fue añadido de forma correcta';
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