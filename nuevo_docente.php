<!DOCTYPE html>
<html>
<head>

<title>Nuevo Docente</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Registrar Docente</h2>

<form action="guardar_docente.php" method="POST">

<input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre">

<input type="text" name="carrera" class="form-control mb-3" placeholder="Carrera">

<input type="text" name="asignatura" class="form-control mb-3" placeholder="Asignatura">

<input type="text" name="telefono" class="form-control mb-3" placeholder="Teléfono">

<input type="email" name="correo" class="form-control mb-3" placeholder="Correo">

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
