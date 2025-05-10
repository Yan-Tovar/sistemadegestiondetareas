<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <style>
        table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
        word-wrap: break-word;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #eaeaea;
    }
    </style>
    <?php
    session_start();
    $id=$_SESSION['usuario_id'];
    $conexion = mysqli_connect("localhost","root","","sistemagestiontareas")or
    die("Problemas de conexión");
    
    $registros=mysqli_query($conexion,"SELECT id, usuario_id, titulo, descripcion, fecha_creacion, completada FROM tareas
    WHERE usuario_id=$id")or
    die("Problemas en el select:".mysqli_error($conexion));
    if($registros==''){
        echo "Aún no hay tareas registradas.";
    }else{?>
    <table>
        <tr>
            <th>Id</th>
            <th>Id Usuario</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Fecha Creación</th>
            <th>Estado</th>
        </tr>
        <?php
        while ($reg = mysqli_fetch_array($registros)) {
            echo "<tr>
                <td>{$reg['titulo']}</td>
                <td>{$id}</td>
                <td>{$reg['titulo']}</td>
                <td>{$reg['descripcion']}</td>
                <td>{$reg['fecha_creacion']}</td>
                <td>";
            
            if ($reg['completada'] == 0) {
                echo "Sin Completar
                    <form action='completar_tarea.php' method='post'>
                        <input type='hidden' name='idtarea' value='{$reg['id']}'>
                        <input type='submit' value='Marcar Completada'>
                    </form>";
            } else {
                echo "Completada";
            }
        
            echo "</td>
            </tr>";
        }
           
    }
    ?>
    </table>
    <hr>
    <a href="nueva_tarea.php">
        <button>Añadir Tarea</button>
    </a>
    <a href="editar_tarea.php"> 
        <button>Editar Tarea</button>
    </a>
    <a href="logout.php"> 
        <button>Eliminar Tarea</button>
    </a>
    <hr>
    <a href="loginphp.php?cerrarsesion"> 
        <button>Cerrar Sesion</button>
    </a>
</body>
</html>