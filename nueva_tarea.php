<?php
    session_start();
    $id=$_SESSION['usuario_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NuevaTarea</title>
</head>
<body>
    Ingrese: 
    <hr>
    <form action="nueva_tareaphp.php" method="post">
        Titulo: <br>
        <input type="text" name="titulo" required><br>
        Descripcion: <br>
        <input type="text" name="descripcion" required><br>
        <br>
        <input type="submit" value="Registrar">
    </form>
    <?php
    $conexion = mysqli_connect("localhost","root","","sistemagestiontareas")or
    die("Problemas de conexión");
    
    $registros=mysqli_query($conexion,"SELECT id, usuario_id, titulo, descripcion, fecha_creacion, completada FROM tareas
    WHERE usuario_id=$id")or
    die("Problemas en el select:".mysqli_error($conexion));
    if ($reg=mysqli_fetch_row($registros)){
        echo '';
    }else{
        echo "No hay tareas registradas aún.";
    }
    ?>
</body>
</html>