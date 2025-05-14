<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompletarTarea</title>
</head>
<body>
    <?php
    session_start();
    $id=$_SESSION['usuario_id'];
    if(isset($id)){
    if(isset($_REQUEST['idtarea'])){
        $valor=1;
        $conexion=mysqli_connect("localhost","root","","sistemagestiontareas") or 
        die ("Problemas con la conexión");

        $registros=mysqli_query($conexion,"update tareas
        set completada=$valor where id='$_REQUEST[idtarea]'") or
        die("Problemas en el select:".mysqli_error($conexion));
        echo "La tarea fue completada con exito";
        header("location: tareas.php");
    }
    else{
        echo "";
    }
}else{
    header("location: index.php");
}
    ?>
</body>
</html>