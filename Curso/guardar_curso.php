<?php
include('../conexion.php');
$conexion=conectar();
$curso_id = $_POST['curso_id'];
$nombre_curso= $_POST['nombre_curso'];
$creditos = $_POST['creditos'];
$sql = "UPDATE curso SET nombre_curso='$nombre_curso', creditos='$creditos' WHERE curso_id='$curso_id'";
$resultado = mysqli_query($conexion, $sql);
desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    <div class="container">
    <h1>Nuevo Alumno</h1>

        <h3>
            <?php
            if(!$resultado){
                echo '<div class="alert alert-danger" role="alert">';
                echo 'El curso no se pudo actualizar';
                echo '</div>';
            }
            else{
                echo '<div class="alert alert-success" role="alert">';
                echo 'Curso actualizado correctamente';
                echo '</div>';
            }
            ?>
        </h3>
        <a href="cursos.php" class="btn btn-success">Volver</a>
    </div>
</body>
</html>