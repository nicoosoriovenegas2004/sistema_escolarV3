<?php
session_start();
include("conexion.php");

if(isset($_POST['correo'])){

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // 🔐 Buscar usuario SOLO por correo (NO contraseña)
    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if($resultado->num_rows === 1){

        $usuario = $resultado->fetch_assoc();

        // 🔐 Verificar contraseña encriptada
        if(password_verify($password, $usuario['password'])){

            $_SESSION['usuario'] = $usuario['correo'];
            header("Location: dashboard.php");
            exit();

        } else {
            $error = "Contraseña incorrecta";
        }

    } else {
        $error = "Usuario no encontrado";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-ligth">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-4">

<div class="card shadow">

<div class="card-body">

<h3>Iniciar de Sesión</h3>

<?php if(isset($error)){ echo "<div class='alert alert-danger'>$error</div>";}?>

<form method="POST">

<input type="email" name="correo" class="form-control mb-3" placeholder="Correo">

<input type="password" name="password" class="form-control mb-3" placeholder="Contraseña">

<button class="btn btn-success">Ingresar</button>

<a href="recuperar.php" class="btn btn-link">¿Olvidaste tu contraseña?</a>

</form>

</div>
</div>
</div>
</div>
</div>

</body>
</html>


