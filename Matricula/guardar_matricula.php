<?php
include('../conexion.php');

//Datos del formulario
$matricula_id = $_POST['matricula_id'];
$alumno_id = $_POST['alumno_id'];
$curso_id = $_POST['curso_id'];

// Para actualizar los datos
$conexion = conectar();
$sql = "UPDATE matricula SET alumno_id='$alumno_id', curso_id='$curso_id' WHERE matricula_id='$matricula_id'";
$resultado = mysqli_query($conexion, $sql);

if (!$resultado) {
  die('Error en la consulta: ' . mysqli_error($conexion));
}

desconectar($conexion);

header("Location: matriculas.php");
exit();
?>