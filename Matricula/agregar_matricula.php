<?php
include('../conexion.php');

// Ver si se envio el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alumno_id = $_POST['alumno_id'];
    $curso_id = $_POST['curso_id'];
    
    $conexion = conectar();
    $sql = "INSERT INTO matricula (alumno_id, curso_id) VALUES ('$alumno_id', '$curso_id')";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        // Redirigir a matriculas
        header('Location: matriculas.php');
        exit();
    } else {
        echo 'Error al agregar la matrícula: ' . mysqli_error($conexion);
    }
    mysqli_close($conexion);
}

// Lista de alumnos y cursos para mostrar
$conexion = conectar();
$sql_alumnos = "SELECT alumno_id, nombres FROM alumno";
$resultado_alumnos = mysqli_query($conexion, $sql_alumnos);
$sql_cursos = "SELECT curso_id, nombre_curso FROM curso";
$resultado_cursos = mysqli_query($conexion, $sql_cursos);
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Agregar Matrícula</h1>
        <form method="POST">
            <div class="form-group">
                <label for="alumno_id">Alumno:</label>
                <select class="form-control" id="alumno_id" name="alumno_id">
                    <?php while ($alumno = mysqli_fetch_array($resultado_alumnos)) { ?>
                        <option value="<?php echo $alumno['alumno_id']; ?>"><?php echo $alumno['nombres']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="curso_id">Curso:</label>
                <select class="form-control" id="curso_id" name="curso_id">
                    <?php while ($curso = mysqli_fetch_array($resultado_cursos)) { ?>
                        <option value="<?php echo $curso['curso_id']; ?>"><?php echo $curso['nombre_curso']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Agregar Matrícula</button>
        </form>
    </div>
</body>
</html>
