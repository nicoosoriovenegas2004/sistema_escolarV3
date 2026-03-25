<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM docentes WHERE id='$id'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Docente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">
<div class="card-body">

<h2 class="text-center mb-4">Editar Docente</h2>

<form action="actualizar_docente.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre_docente" class="form-control"
        value="<?php echo $fila['nombre_docente']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Carrera</label>
        <input type="text" name="carrera_docente" class="form-control"
        value="<?php echo $fila['carrera_docente']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Asignatura</label>
        <input type="text" name="asignatura" class="form-control"
        value="<?php echo $fila['asignatura']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono_docente" class="form-control"
        value="<?php echo $fila['telefono_docente']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="text" name="correo_docente" class="form-control"
        value="<?php echo $fila['correo_docente']; ?>">
    </div>

    <div class="d-flex justify-content-between">
        <a href="docentes.php" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </div>

</form>

</div>
</div>

</div>

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