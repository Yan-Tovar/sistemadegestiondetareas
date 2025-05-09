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
    if (mysqli_fetch_row($registros)){
        while(mysqli_fetch_row($registros)){
            echo "____________________________________________________________<br>";
            echo $reg['id']."<br>";
            echo $reg['usuario_id']."<br>";
            echo $reg['titulo']."<br>";
            echo $reg['descripcion']."<br>";
            echo $reg['fecha_creacion']."<br>";
            echo $reg['completada']."<br>";
        }
    }else{
        echo "No hay tareas registradas aún.";
    }
    ?>
    <hr>
    <a href=""> 
        <button>Añadir Tarea</button>
    </a>
    <a href=""> 
        <button>Eliminar Tarea</button>
    </a>
    <a href=""> 
        <button>Modificar Tarea</button>
    </a>
    <a href=""> 
        <button>Marcar como completada</button>
    </a>
</body>
</html>