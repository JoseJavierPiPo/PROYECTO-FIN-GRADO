<?php
include_once("conn.php");



function iniciosesion($conn, $nombre, $dni){
    if(isset($_POST["DNI"]) && isset($_POST["Nombre"])){
        //ERRORES VARIABLES DE SESSION
        $nombreno = "El nombre no existe";
        $dnino = "El DNI no coincide con el nombre introducido";

        // Consulta para verificar si el usuario existe en la base de datos
        $sql = "SELECT * FROM socios WHERE Nombre = '$nombre'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){
            $_SESSION["Error"] = $nombreno;
        }else{
            $sql1 = "SELECT * FROM socios WHERE Nombre = '$nombre' AND DNI = '$dni' "; 
            $result1 = mysqli_query($conn, $sql1);
            
            if(mysqli_num_rows($result1) == 0){
                $_SESSION["Error"] = $dnino;
            }else{
                $row = mysqli_fetch_assoc($result1);
                $rol = $row['ROL']; 
                //VARIABLES DE SESSION 
                $_SESSION["Nombre"] = $nombre;
                $_SESSION["DNI"] = $dni;
                $_SESSION["ROL"] = $rol; 
                    

                // Redirigir según el rol
                if ($rol === 'Admin') {
                    echo "<script>window.location.href = '../subpáginas/admin/areaprivadaadmin.php';</script>"; // Redirigir a la página de administrador
                } else {
                    echo "<script>window.location.href = '../subpáginas/socios/areaprivadasocio.php';</script>"; // Redirigir a la página de socio
                }
                exit(); 
            }
        }
    } else {
        $_SESSION["Error"] = "Por favor, complete todos los campos.";
        header("Location: socio.php");
        exit(); // Detener la ejecución si no se envían los datos correctamente
    }
}


function mostrarvalores($conn, $nombre, $dni){
    $sql = "SELECT * FROM socios WHERE Nombre = '$nombre' AND DNI = '$dni' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $rol = $row['ROL']; $_SESSION["ROL"] = $rol;
    $a1 = $row['Apellido1']; $_SESSION["Apellido1"] = $a1;
    $a2 = $row['Apellido2']; $_SESSION['Apellido2'] = $a2;
    $id_socio = $row['ID_Socio']; $_SESSION["ID_Socio"] = $id_socio;
    $fecha_alta = $row['Fecha_Alta']; $_SESSION["Fecha_Alta"] = $fecha_alta;
    
    
}


// ADMINISTRADOR - FUNCION
function insertarsocio ($conn,$dni,$nombre,$apellido1,$apellido2,$fecha_nacimiento,$localidad,$domicilio,$codigo_postal,$telefono,$email,$fecha_alta){
    $insercionsi = "El socio ha sido registrado correctamente";
    $insercionno = "El socio no se ha registrado";
    if(isset($_POST["dni"]) && isset($_POST["nombre"]) && isset($_POST["apellido1"]) && isset($_POST["apellido2"]) && isset($_POST["fecha_nacimiento"]) && isset($_POST["localidad"]) && isset($_POST["domicilio"]) && isset($_POST["codigo_postal"]) && isset($_POST["telefono"]) && isset($_POST["email"]) && isset($_POST["fecha_alta"])){
        
        $insercion =  "INSERT INTO `socios` (`ID_Socio`, `DNI`, `Nombre`, `Apellido1`, `Apellido2`, `Fecha_Nacimiento`, `Localidad`, `Domicilio`, `Codigo_Postal`, `Telefono`, `Email`, `Fecha_Alta`, `Fecha_Baja`, `Estado`, `ROL`) VALUES (NULL, '$dni', '$nombre', '$apellido1', '$apellido2', '$fecha_nacimiento', '$localidad', '$domicilio', '$codigo_postal', '$telefono', '$email', '$fecha_alta', NULL, 'Activo', 'Socio')";
        if (mysqli_query($conn, $insercion)) {
            $sql = "SELECT * FROM socios WHERE DNI = '$dni' AND Nombre = '$nombre' AND Apellido1 = '$apellido1' AND Apellido2 = '$apellido2'";
            $result1 = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result1) > 0){
                $_SESSION["Error"] = $insercionsi;
            }
        } else {
            $_SESSION["Error"] = $insercionno . " - " . mysqli_error($conn);
        }
    }
}


function actualizarsocio(){
    
}

function modificarestadosocio($conn, $dni, $nombre, $estado){
    $sql = "SELECT * FROM socios WHERE DNI = '$dni' AND Nombre = '$nombre'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $sql = "UPDATE socios SET Estado = '$estado' WHERE DNI = '$dni' AND Nombre = '$nombre';";
        $result = mysqli_query($conn, $sql);
        if($result){
            $_SESSION["Error"] = "El socio ha sido dado de baja";
        }else{
            $_SESSION["Error"] = "El socio no se ha dado de baja correctamente";
        }
    }else{
        $_SESSION["Error"] = "El socio no existe";
    }
    
}
function cambiarestadosocio(){}

function buscarporsocio () {}




/*
session_start();
session_destroy();
header('Location: login.php');
exit();
*/

?>