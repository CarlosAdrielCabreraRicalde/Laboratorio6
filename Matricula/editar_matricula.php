<?php
include('../conexion.php');
$conexion=conectar();
$matricula_id=$_GET['id'];
$sql="SELECT matricula_id, alumno_id, curso_id FROM matricula WHERE matricula_id='$matricula_id'";
$resultado=mysqli_query($conexion,$sql);
$matricula=mysqli_fetch_array($resultado);
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Editar Matrícula</h1>
        <form method="post" action="guardar_matricula.php">
            <div class="mb-2">
                <label for="alumno_id" class="form-label">Alumno:</label>
                <select class="form-control" id="alumno_id" name="alumno_id">
                <?php
                    $conexion=conectar();
                    $sql="SELECT alumno_id, nombres FROM alumno";
                    $resultado=mysqli_query($conexion,$sql);
                    while($alumno=mysqli_fetch_array($resultado)){
                        $selected = ($alumno['alumno_id'] == $matricula['alumno_id']) ? 'selected' : '';
                        echo '<option value="'.$alumno['alumno_id'].'" '.$selected.'>'.$alumno['nombres'].'</option>';
                    }
                    desconectar($conexion);
                ?>
                </select>
            </div>
            <div class="mb-2">
                <label for="curso_id" class="form-label">Curso:</label>
                <select class="form-control" id="curso_id" name="curso_id">
                <?php
                    $conexion=conectar();
                    $sql="SELECT curso_id, nombre_curso FROM curso";
                    $resultado=mysqli_query($conexion,$sql);
                    while($curso=mysqli_fetch_array($resultado)){
                        $selected = ($curso['curso_id'] == $matricula['curso_id']) ? 'selected' : '';
                        echo '<option value="'.$curso['curso_id'].'" '.$selected.'>'.$curso['nombre_curso'].'</option>';
                    }
                    desconectar($conexion);
                ?>
                </select>
            </div>
            <input type="hidden" name="matricula_id" value="<?php echo $matricula['matricula_id']; ?>">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="matriculas.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>
</html>