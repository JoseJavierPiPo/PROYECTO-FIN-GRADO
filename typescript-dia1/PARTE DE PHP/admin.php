<?php
include_once("funciones.php");

$nombre = $_SESSION['Nombre'];
$dni = $_SESSION['DNI'];
$rol = $_SESSION['ROL'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Administrador</title>
</head>
<body>
    <center>
        <h1>BIENVENIDO AL MENÚ DE ADMINISTRADOR</h1>
        
        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
        <p><strong>DNI:</strong> <?php echo $dni; ?></p>
        <p><strong>Rol:</strong> <?php echo $rol; ?></p>

        <hr>

        <form method="post" action="admin_dashboard.php">
            <select id="menu" name="menu" required>
                <option value="">Seleccione alguna opción del menú:</option>
                <option value="eliminar_socio">Eliminar socio de la lista activa</option>
                <option value="añadir_socio">Añadir socio a la lista activa</option>
            </select>
            <br><br>
            <button type="submit">Realizar acción</button>
        </form>

        <hr>

        <?php
        ?>

    </center>
</body>
</html>
