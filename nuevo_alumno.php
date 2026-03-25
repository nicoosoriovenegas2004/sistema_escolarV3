<!DOCTYPE html>
<html>
<head>

<title>Nuevo Alumno</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Registrar Alumno</h2>

<form action="guardar_alumno.php" method="POST">

<input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre Alumno">

<input type="text" name="apellido" class="form-control mb-3" placeholder="Apellido Alumno">

<input type="text" name="direccion" class="form-control mb-3" placeholder="Dirección">

<input type="text" name="telefono" class="form-control mb-3" placeholder="Teléfono">

<input type="text" name="anio" class="form-control mb-3" placeholder="Año Escolar">

<button class="btn btn-primary">Guardar</button>

</form>

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
