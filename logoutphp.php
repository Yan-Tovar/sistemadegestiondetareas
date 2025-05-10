<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EliminarTarea</title>
</head>
<body>
    <?php
    $conexion=mysqli_connect("localhost","root","","sistemagestiontareas") or 
    die ("Problemas con la conexión");

    $registros=mysqli_query($conexion,"delete from tareas
    where id='$_REQUEST[idtarea]'") or
    die("Problemas en el select:".mysqli_error($conexion));
    echo "El curso fue eliminado con exito";
    header("location: tareas.php");
    ?>
</body>
</html>