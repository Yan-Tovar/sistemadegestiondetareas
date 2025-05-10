<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EliminarTarea</title>
</head>
<body>
    <?php
    session_start();
    $id=$_SESSION['usuario_id'];
    $conexion=mysqli_connect("localhost","root","","sistemagestiontareas") or 
    die ("Problemas con la conexión");
    $registros=mysqli_query($conexion,"select * from tareas where usuario_id=$id") or
    die ("Problemas en el select:".mysqli_error($conexion));
    ?>
    <form action="logoutphp.php" method="post">
        seleccione el titulo de la tarea a eliminar
        <select name="idtarea" required>
        <?php
        while($reg=mysqli_fetch_array($registros)){
            if($regalu['idtarea']==$reg['id'])
            echo "<option value=\"$reg[id]\"
            selected>$reg[titulo]</option>";
            else
            echo "<option value=\"$reg[id]\">$reg[titulo]</option>";
        }
        ?>
        </select>

        <br>
        <br>
        <input type="submit" value="Buscar">
    </form>
</body>
</html>