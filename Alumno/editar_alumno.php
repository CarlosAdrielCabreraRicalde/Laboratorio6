<?php
include('../conexion.php');

$conexion=conectar();

$alumno_id = $_GET['id']; // 
$sql="SELECT alumno_id, nombres, ape_paterno, ape_materno FROM alumno WHERE alumno_id = '$alumno_id'";

$resultado=mysqli_query($conexion,$sql);

desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar el Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Editar Alumno</h1>
        <?php
        //Array con diccionario
        while($alumno=mysqli_fetch_array($resultado)){
            $alumno_id=$alumno['alumno_id'];
            $nombres=$alumno['nombres'];
            $ape_paterno=$alumno['ape_paterno'];
            $ape_materno=$alumno['ape_materno'];
        ?>
        <form method="post" action="guardar_edicion.php">
            <div class="mb-2">
                <label for="nombres" class="form-label">Nombres completos:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres; ?>">
            </div>
            <div class="mb-2">
                <label for="ape_paterno" class="form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="ape_paterno" name="ape_paterno" value="<?php echo $ape_paterno; ?>">
            </div>
            <div class="mb-2">
                <label for="ape_materno" class="form-label">Apellido Materno:</label>
                <input type="text" class="form-control" id="ape_materno" name="ape_materno" value="<?php echo $ape_materno; ?>">
            </div>
            <input type="hidden" name="alumno_id" value="<?php echo $alumno_id; ?>">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="alumnos.php" class="btn btn-danger">Cancelar</a>
        </form>
        <?php
        }
        ?>
    </div>
</body>
</html>
