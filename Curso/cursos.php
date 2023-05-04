<?php
include('../conexion.php');
$conexion=conectar();
$sql='SELECT curso_id, nombre_curso, creditos from curso';
$resultado=mysqli_query($conexion,$sql);
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
        <h1>Cursos</h1>
        <div>
            <table class="table">
            <a href="agregar_curso.html" class="btn shadow btn-success">Nuevo Curso</a>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Creditos</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($curso=mysqli_fetch_array($resultado)){
                        $curso_id=$curso['curso_id'];
                        $nombre_curso=$curso['nombre_curso'];
                        $creditos=$curso['creditos'];
                        echo '<tr>';
                        echo '<td>'.$curso_id.'</td>';
                        echo '<td>'.$nombre_curso.'</td>';
                        echo '<td>'.$creditos.'</td>';
                        echo '<td><a href="editar_curso.php?id='.$curso_id.'" class="btn shadow btn-warning">Editar</a> <a href="eliminar_curso.php?id='.$curso_id.'" class="btn shadow btn-danger">Borrar</a></td>';
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
