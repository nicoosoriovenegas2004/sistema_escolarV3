<?php

include("conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo = $_POST['tipo_usuario'];
$correo = $_POST['correo'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Consulta SQL para insertar usuario
$sql = "INSERT INTO usuarios(nombre,apellido,tipo_usuario,correo,password)
VALUES('$nombre','$apellido','$tipo','$correo','$password')";

// Ejecutar consulta
mysqli_query($conexion,$sql);

// Redireccionar
header("Location:index.php");

?>
