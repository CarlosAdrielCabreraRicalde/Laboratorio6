<?php
include('../conexion.php');
$conexion=conectar();
$sql='SELECT m.matricula_id, a.nombres, c.nombre_curso
FROM matricula m
INNER JOIN alumno a ON m.alumno_id = a.alumno_id
INNER JOIN curso c ON m.curso_id = c.curso_id
ORDER BY m.matricula_id ASC;';
$resultado=mysqli_query($conexion,$sql);
if (!$resultado) {
  die('Error en la consulta: ' . mysqli_error($conexion));
}
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrículas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Matrículas</h1>
        <div>
            <table class="table">
            <a href="agregar_matricula.php" class="btn shadow btn-success">Nueva Matrícula</a>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Alumno</th>
                        <th scope="col">Curso</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //recorrer el array con el diccionario
                    while($matricula=mysqli_fetch_array($resultado)){
                        $matricula_id=$matricula['matricula_id'];
                        $nombre_alumno=$matricula['nombres'];
                        $nombre_curso=$matricula['nombre_curso'];
                        echo '<tr>';
                        echo '<td>'.$matricula_id.'</td>';
                        echo '<td>'.$nombre_alumno.'</td>';
                        echo '<td>'.$nombre_curso.'</td>';
                        echo '<td><a href="editar_matricula.php?id='.$matricula_id.'" class="btn shadow btn-warning">Editar</a> <a href="eliminar_matricula.php?id='.$matricula_id.'" class="btn shadow btn-danger">Borrar</a></td>';
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
