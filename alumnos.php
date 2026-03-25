<?php
include("conexion.php");

$sql = "SELECT * FROM alumnos";
$resultado=mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
<html>
    <head>

    <title>Alumnos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<H2>Gestion de Alumnos</H2>

<div class="d-flex gap-2 mb-3">
    
    <a href="nuevo_alumno.php" class="btn btn-success">Nuevo Alumno</a>

    <a href="dashboard.php" class="btn btn-secondary">Volver</a>

    <a href="exportar_excel.php" class="btn btn-primary">Exportar a Excel</a>

</div>

<table class="table table-bordered">

<tr>
<th>ID </th>
<th>Nombre </th>
<th>Apellido </th>
<th>Direccion </th>
<th>Telefono </th>
<th>Año </th>
<th>Acciones</th>

<?php while($fila=mysqli_fetch_array($resultado)){ ?>

    <tr>
        <td><?php echo $fila ['id'];?></td>
        <td><?php echo $fila ['nombre_alumno'];?></td>
        <td><?php echo $fila ['apellido_alumno'];?></td>
        <td><?php echo $fila ['direccion_alumno'];?></td>
        <td><?php echo $fila ['telefono_alumno'];?></td>
        <td><?php echo $fila ['anio_escolar'];?></td>

<td>

<a href="editar_alumno.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">Editar</a>

<a href="eliminar_alumno.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>

</td>
</tr>

<?php

} ?>
</table>

<style>

body {
  margin: 0;
  height: 100vh;
  background-image: url("imagenes/fondo6.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
</style>

</body>
</html>


