<?php
include('../conexion.php');

$conexion=conectar();

$alumno_id = $_GET['id']; 

//Consulta para eliminar el registro
$sql="DELETE FROM alumno WHERE alumno_id ='$alumno_id'";

//Ejecutamos
if(mysqli_query($conexion,$sql)){
    //Si se borra, redireccionar a alumnos
    header('Location: alumnos.php');
}else{
    echo "No se pudo borrar al alumno seleccionado".mysqli_error($conexion);
}
desconectar($conexion);
?>
