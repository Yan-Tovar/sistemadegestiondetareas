<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <?php
    $contrasena = $_POST['contrasena'];
        $confirmarcontrasena=$_REQUEST['confirmarcontrasena'];
        if($contrasena!=$confirmarcontrasena){
            echo "Las contraseñas no-coinciden";
        }else{
            // Conexión a la base de datos
            $conn = new mysqli('localhost', 'root', '', 'sistemagestiontareas');
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            // Hashear la contraseña
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo,
            contrasena) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $correo, $hash);
            if ($stmt->execute()) {
            echo "Usuario registrado con éxito.";
            echo "<a href='login.php'>Ir a Login</a>";
            } else {
            echo "Error: " . $stmt->error;
            }
            $stmt->close();
            }
        }
        
    ?>
</body>
</html>