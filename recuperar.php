<?php
include("conexion.php");

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['correo'])){

    $correo = $_POST['correo'];

    // Verificar si el correo existe
    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0){

        // Generar token
        $token = bin2hex(random_bytes(50));
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Guardar token en BD
        $sql = "UPDATE usuarios 
                SET token='$token', token_expira='$expira' 
                WHERE correo='$correo'";
        mysqli_query($conexion, $sql);

        // Link de recuperación (localhost para pruebas)
        $link = "http://localhost/sistema_escolarV2/restablecer.php?token=$token";

        // PHPMailer
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nicoosoriovenegas2004@gmail.com'; // tu correo Gmail completo
            $mail->Password = 'gtam mkmu xcmc hpdq';  // contraseña de aplicación
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Evitar error de certificado en localhost
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->setFrom('TUCORREO@gmail.com', 'Sistema Escolar');
            $mail->addAddress($correo);

            $mail->isHTML(true);
            $mail->Subject = 'Recuperar contraseña';
            $mail->Body = "
                <h3>Recuperación de contraseña</h3>
                <p>Haz clic en el siguiente enlace para cambiar tu contraseña:</p>
                <a href='$link'>Restablecer contraseña</a>
                <p>Este enlace expira en 1 hora.</p>
            ";

            $mail->send();
            $mensaje = "Revisa tu correo para continuar";

        } catch (Exception $e) {
            $mensaje = "Error al enviar correo: {$mail->ErrorInfo}";
        }

    } else {
        $mensaje = "El correo no existe";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recuperar contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-4">
<div class="card shadow">
<div class="card-body">

<h3>Recuperar contraseña</h3>

<?php if(isset($mensaje)){ ?>
    <div class="alert alert-info"><?php echo $mensaje; ?></div>
<?php } ?>

<form method="POST">
    <input type="email" name="correo" class="form-control mb-3" placeholder="Ingresa tu correo" required>
    <button type="submit" class="btn btn-primary w-100">Enviar enlace</button>
</form>

<a href="login.php" class="btn btn-link mt-2">Volver al login</a>

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