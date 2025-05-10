<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EditarTarea</title>
</head>
<body>
    <?php
    $conexion=mysqli_connect("localhost","root","","sistemagestiontareas") or 
    die ("Problemas con la conexión");

    $registros=mysqli_query($conexion,"select id, titulo, descripcion from tareas where id='$_REQUEST[idtarea]'") or
    die ("Problemas en el select:".mysqli_error($conexion));
    $reg=mysqli_fetch_array($registros);
    ?>
    <form action="editar_tareaphp_2.php">
        Ingrese el titulo nuevo: <br>
        <input type="text" name="titulonuevo" value="<?php echo $reg['titulo']?>"><br>
        ingrese la descripcion nueva: <br>
        <input type="text" name="descripcionnueva" value="<?php echo $reg['descripcion']?>"><br>
        <input type="hidden" name="idtarea" value="<?php echo $reg['id']?>">
        <br><br>
        <input type="submit" value="Modificar">
    </form>
    
</body>
</html>