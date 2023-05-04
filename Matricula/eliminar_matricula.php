<?php
include('../conexion.php');
$conexion=conectar();
$matricula_id=$_GET['id'];
$sql="DELETE FROM matricula WHERE matricula_id='$matricula_id'";
if (mysqli_query($conexion,$sql)) {
    header('Location: matriculas.php');
}else{
    echo "No se pudo eliminar el registro".mysqli_error($conexion);
}
desconectar($conexion);
?>

