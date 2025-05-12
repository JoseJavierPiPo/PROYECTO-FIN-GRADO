<?php
include_once 'conn.php';
function actualizarsocio1($conn, $id_socio){
    if(isset($_POST["id_socio"])){
        $id_socio = $_POST["id_socio"];
        $_SESSION['id_socio'] = $_POST['id_socio'];

        $sql = "SELECT * FROM socios WHERE ID_Socio = '$id_socio'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            // Guardar los datos del socio en la sesión
            $socio = mysqli_fetch_assoc($result);
            $_SESSION['socio_actual'] = $socio;
            
            echo "<script>window.location.href = '../gestion/actualizar_socio2.php';</script>";
            exit();
        }
        else{
            $_SESSION["Error"] = "El socio no existe";
        }
    }
}
function actualizarsocio2($conn, $id_socio){
    if(isset($_POST["id_socio"])){
        $id_socio = $_POST["id_socio"];
        
        $sql = "SELECT * FROM socios WHERE ID_Socio = '$id_socio'";
        $result = mysqli_query($conn, $sql);
        $socio = mysqli_fetch_assoc($result);
        
        if(isset($_POST["actualizar"])){
            // Recoger datos del formulario
            $id_socio = $_POST["id_socio"];
            $dni = !empty($_POST["dni"]) ? "'" . $_POST["dni"] . "'" : "NULL";
            $nombre = !empty($_POST["nombre"]) ? "'" . $_POST["nombre"] . "'" : "NULL";
            $apellido1 = !empty($_POST["apellido1"]) ? "'" . $_POST["apellido1"] . "'" : "NULL";
            $apellido2 = !empty($_POST["apellido2"]) ? "'" . $_POST["apellido2"] . "'" : "NULL";
            $fecha_nacimiento = !empty($_POST["fecha_nacimiento"]) ? "'" . $_POST["fecha_nacimiento"] . "'" : "NULL";
            $localidad = !empty($_POST["localidad"]) ? "'" . $_POST["localidad"] . "'" : "NULL";
            $domicilio = !empty($_POST["domicilio"]) ? "'" . $_POST["domicilio"] . "'" : "NULL";
            $codigo_postal = !empty($_POST["codigo_postal"]) ? "'" . $_POST["codigo_postal"] . "'" : "NULL";
            $telefono = !empty($_POST["telefono"]) ? "'" . $_POST["telefono"] . "'" : "NULL";
            $email = !empty($_POST["email"]) ? "'" . $_POST["email"] . "'" : "NULL";
            $fecha_alta = !empty($_POST["fecha_alta"]) ? "'" . $_POST["fecha_alta"] . "'" : "NULL";
            $fecha_baja = !empty($_POST["fecha_baja"]) ? "'" . $_POST["fecha_baja"] . "'" : "NULL";
            $rol = !empty($_POST["rol"]) ? "'" . $_POST["rol"] . "'" : "NULL";
            $estado = !empty($_POST["estado"]) ? "'" . $_POST["estado"] . "'" : "NULL";

            $sql2 = "UPDATE socios SET
            DNI = $dni,
            Nombre = $nombre,
            Apellido1 = $apellido1,
            Apellido2 = $apellido2,
            Fecha_Nacimiento = $fecha_nacimiento,
            Localidad = $localidad,
            Domicilio = $domicilio,
            Codigo_Postal = $codigo_postal,
            Telefono = $telefono,
            Email = $email,
            Fecha_Alta = $fecha_alta,
            Fecha_Baja = $fecha_baja,
            Estado = $estado,
            ROL = $rol
            WHERE ID_Socio = '$id_socio'";

            if (mysqli_query($conn, $sql2)) {
                $_SESSION["correcto"] = "Socio actualizado correctamente";
            }
            else{
                $_SESSION["error"] = "Error al actualizar el socio: " . mysqli_error($conn);
            }
        }
    }
}


?>