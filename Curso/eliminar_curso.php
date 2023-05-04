<?php
include('../conexion.php');

$conexion=conectar();

$curso_id = $_GET['id']; 

//Consulta para borrar
$sql="DELETE FROM curso WHERE curso_id ='$curso_id'";

if(mysqli_query($conexion,$sql)){
   //Mandar a la pagina de alumnos, si se borra
    header('Location: cursos.php');
}else{
    echo "No se pudo borrar el registro: ".mysqli_error($conexion);
}
//Cerrar
desconectar($conexion);
?>
