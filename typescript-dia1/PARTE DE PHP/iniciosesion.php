<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body>
    <center>
        <h1>BIENVENIDO AL INICIO DE SESIÓN</h1>
    <fieldset>
        <form method="post" action="iniciosesion.php"> <br><br>
            <input type="text" name="Nombre" placeholder="Introduce el nombre" required> <br><br>
            <input type="text" name="DNI" placeholder="Introduce el DNI" required> <br><br>
            <button type="submit">Iniciar sesión</button>
        </form>
    </fieldset>
    </center>

    <?php
        include_once ("funciones.php");
        // INDICAMOS LAS VARIABLES
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["Nombre"];
            $dni = $_POST["DNI"];

            iniciosesion($conn, $nombre, $dni);

            //ERRORES VARIABLES DE SESSION
            if (isset($_SESSION["Error"])) {
                echo "<p style='color: red;'>" . $_SESSION["Error"] . "</p>";
            }
        }
        
    ?>
</body>
</html>