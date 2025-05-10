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
    <?php
    $fechaActual = date("Y-m-d H:i:s");
    $conexion = mysqli_connect("localhost","root","","sistemagestiontareas")or
    die("Problemas de conexión");

    mysqli_query($conexion,"INSERT INTO tareas (usuario_id,titulo,descripcion,fecha_creacion,completada)
    VALUE ('$id','$_REQUEST[titulo]','$_REQUEST[descripcion]','$fechaActual',0)")or
    die("Problemas en el select:".mysqli_error($conexion));
    if(mysqli_affected_rows($conexion)>0){
        echo "Tarea registrada correctamente";
        header("Location: tareas.php");
    }else{
        echo "La tarea no se pudo registrar";
        header("Location: tareas.php");
    }

    ?>
</body>
</html>