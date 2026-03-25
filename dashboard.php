<?php
session_start();
if(!isset($_SESSION['usuario'])){
header("Location:login.php");
}
?>

<!DOCTYPE html>

<html>
<head>

<title>Dashboard</title>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
<div class="container">

<span class="navbar-brand">Sistema Escolar</span>

<img src="imagenes/logo.png" class="logo-inicio mb-3"width="100" height="59">

<a href="logout.php" class="btn btn-danger">Cerrar Sesion</a>

</div>
</nav>

<div class="container mt-5">

<div class="row">

<div class="col-md-3">
<div class="card shadow text-center">
<div class="card-body">

<h5>Alumnos</h5>
<a href="alumnos.php" class="btn btn-primary">administrar</a>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow text-center">
<div class="card-body">

<h5>Docentes</h5>
<a href="docentes.php" class="btn btn-primary">administrar</a>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow text-center">
<div class="card-body">

<h5>Usuarios</h5>
<a href="usuarios.php" class="btn btn-primary">administrar</a>
</div>
</div>
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







