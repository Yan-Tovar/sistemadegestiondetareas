<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="registrophp.php" method="post">
        Ingrese su nombre: <br>
        <input type="text" name="nombre" required><br>
        Ingrese su correo: <br>
        <input type="mail" name="correo" required><br>
        Cree su contraseña: <br>
        <input type="password" name="contrasena" required><br>
        Confirme su contraseña: <br>
        <input type="password" name="confirmarcontrasena" required><br><br>
        <input type="submit" name="Registrar"><br>
    </form>
</body>
</html>