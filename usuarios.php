<?php
include("conexion.php");


$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

if($buscar != ''){
    $sql = "SELECT * FROM usuarios 
            WHERE id LIKE'%$buscar%' 
            OR nombre LIKE '%$buscar%' 
            OR apellido LIKE '%$buscar%' 
            OR correo LIKE '%$buscar%'";
} else {
    $sql = "SELECT * FROM usuarios";
}

$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h2>Gestion de Usuarios</h2>

<div class="d-flex justify-content-between align-items-center mb-3">
    
<div class="d-flex gap-2 mb-3">
    
    <a href="nuevo_usuario.php" class="btn btn-success">Nuevo Usuario</a>

    <a href="dashboard.php" class="btn btn-secondary">Volver</a>

</div>
    <form method="GET" class="d-flex">
        <input 
            type="text" 
            name="buscar" 
            class="form-control me-2" 
            placeholder="Buscar usuario..."
            value="<?php echo $buscar; ?>"
        >
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

</div>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Tipo de Usuario</th>
<th>Correo</th>
<th>Acciones</th>
</tr>

<?php while($fila = mysqli_fetch_array($resultado)){ ?>

<tr>
    <td><?php echo $fila['id']; ?></td>
    <td><?php echo $fila['nombre']; ?></td>
    <td><?php echo $fila['apellido']; ?></td>
    <td><?php echo $fila['tipo_usuario']; ?></td>
    <td><?php echo $fila['correo']; ?></td>

    <td>
        <a href="editar_usuario.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
        <a href="eliminar_usuario.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>