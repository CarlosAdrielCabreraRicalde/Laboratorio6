<?php
include('../conexion.php');
$conexion=conectar();
$curso_id=$_GET['id'];
$sql="SELECT curso_id, nombre_curso, creditos FROM curso WHERE curso_id='$curso_id'";
$resultado=mysqli_query($conexion,$sql);
$curso=mysqli_fetch_array($resultado);
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar el Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Editar Curso</h1>
        <form method="post" action="guardar_curso.php">
            <div class="mb-2">
                <label for="nombre_curso" class="form-label">Nombre del curso:</label>
                <input type="text" class="form-control" id="nombre_curso" name="nombre_curso" value="<?php echo $curso['nombre_curso']; ?>">
            </div>
            <div class="mb-2">
                <label for="creditos" class="form-label">Créditos:</label>
                <input type="text" class="form-control" id="creditos" name="creditos" value="<?php echo $curso['creditos']; ?>">
            </div>
            <input type="hidden" name="curso_id" value="<?php echo $curso['curso_id']; ?>">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="cursos.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>
</html>
