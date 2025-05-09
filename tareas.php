<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <?php
    session_start();
    $id=$_SESSION['usuario_id'];
    $conexion = mysqli_connect("localhost","root","","sistemagestiontareas")or
    die("Problemas de conexión");
    
    $registros=mysqli_query($conexion,"SELECT id, usuario_id, titulo, descripcion, fecha_creacion, completada FROM tareas
    WHERE usuario_id=$id")or
    die("Problemas en el select:".mysqli_error($conexion));
    if(isset($registros)){
        echo "";
    }else{
        echo "Aún no hay tareas registradas.";
    }
    while ($reg=mysqli_fetch_array($registros)){
            echo "____________________________________________________________<br>";
            echo "Titulo: ".$reg['titulo']."<br>";
            echo "Descripcion: ".$reg['descripcion']."<br>";
            echo "Fecha de creación: ".$reg['fecha_creacion']."<br>";
            echo "Estado: ".$reg['completada']."<br>";       
    }
    ?>
    <hr>
    <a href="nueva_tarea.php">
        <button>Añadir Tarea</button>
    </a>
    <a href="editar_tarea.php"> 
        <button>Editar Tarea</button>
    </a>
    <a href="eliminar_tarea.php"> 
        <button>Eliminar Tarea</button>
    </a>
    <a href="marcar_completada.php"> 
        <button>Marcar como completada</button>
    </a>
</body>
</html>