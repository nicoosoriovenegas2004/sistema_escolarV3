<?php
include("conexion.php");

$sql = "SELECT * FROM docentes";
$resultado=mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
<html>
    <head>

    <title>Docentes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<H2>Gestion de Docentes</H2>

<div class="d-flex gap-2 mb-3">
    
    <a href="nuevo_docente.php" class="btn btn-success">Nuevo Docente</a>

    <a href="dashboard.php" class="btn btn-secondary">Volver</a>

</div>

<table class="table table-bordered">

<tr>
<th>ID </th>
<th>Nombre </th>
<th>Carrera </th>
<th>Asignatura </th>
<th>Telefono </th>
<th>Correo </th>
<th>Acciones</th>

<?php while($fila=mysqli_fetch_array($resultado)){ ?>

    <tr>
        <td><?php echo $fila ['id'];?></td>
        <td><?php echo $fila ['nombre_docente'];?></td>
        <td><?php echo $fila ['carrera_docente'];?></td>
        <td><?php echo $fila ['asignatura'];?></td>
        <td><?php echo $fila ['telefono_docente'];?></td>
        <td><?php echo $fila ['correo_docente'];?></td>

<td>

<a href="editar_docente.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">Editar</a>

<a href="eliminar_docente.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>

</tr>
</td>

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


