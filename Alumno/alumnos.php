<?php
include('../conexion.php');
$conexion=conectar();

$sql='SELECT alumno_id, nombres, ape_paterno, ape_materno from alumno';
$resultado=mysqli_query($conexion,$sql);
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Alumnos</h1>
        <div>
            <a href="agregar.html" class="btn shadow btn-success">Nuevo Alumno</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombres completos</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                //Array con diccionario
                while($alumno=mysqli_fetch_array($resultado)){
                    $alumno_id=$alumno['alumno_id'];
                    $nombres=$alumno['nombres'];
                    $ape_paterno=$alumno['ape_paterno'];
                    $ape_materno=$alumno['ape_materno'];

                    echo '<tr>';
                    echo '<td>'.$alumno_id.'</td>';
                    echo '<td>'.$nombres.'</td>';
                    echo '<td>'.$ape_paterno.'</td>';
                    echo '<td>'.$ape_materno.'</td>';
                    echo '<td><a href="editar_alumno.php?id='.$alumno_id.'" class="btn shadow btn-warning">Editar</a> <a href="eliminar_alumno.php?id='.$alumno_id.'" class="btn shadow btn-danger">Eliminar</a></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
            <a href="../index.html" class="btn shadow btn-primary">Volver</a>
        </div>
    </div>
</body>
</html>