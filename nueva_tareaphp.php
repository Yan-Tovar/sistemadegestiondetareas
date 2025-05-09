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
    $fecha=date("Y/m/d");
    $conexion = mysqli_connect("localhost","root","","sistemagestiontareas")or
    die("Problemas de conexión");

    mysqli_query($conexion,"INSERT INTO tareas (id,usuario_id,titulo,descripcion,fecha_creacion,completada)
    VALUE ('',$id,'$_REQUEST[titulo]','$_REQUEST[descripcion]',$fecha,'')")or
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