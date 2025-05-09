<?php
include_once("conn.php");


//VARIABLE INICIO DE SESIÓN
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
    }
}

// MOSTRAR VALORES DEL SOCIO 
function mostrarvalores($conn, $nombre, $dni){
    $sql = "SELECT * FROM socios WHERE Nombre = '$nombre' AND DNI = '$dni' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $rol = $row['ROL']; $_SESSION["ROL"] = $rol;
    $a1 = $row['Apellido1']; $_SESSION["Apellido1"] = $a1;
    $a2 = $row['Apellido2']; $_SESSION['Apellido2'] = $a2;
    $id_socio = $row['ID_Socio']; $_SESSION["ID_Socio"] = $id_socio;
    $fecha_alta = $row['Fecha_Alta']; $_SESSION["Fecha_Alta"] = $fecha_alta;
    $estado = $row['Estado']; $_SESSION["Estado"] = $estado;
    
    
}


// ADMINISTRADOR - FUNCIONES

// INSERTAR SOCIO
function insertarsocio($conn, $dni, $nombre, $apellido1, $apellido2, $fecha_nacimiento, $localidad, $domicilio, $codigo_postal, $telefono, $email, $fecha_alta) {
    try {
        $sql = "INSERT INTO `socios` (`DNI`, `Nombre`, `Apellido1`, `Apellido2`, `Fecha_Nacimiento`, `Localidad`, `Domicilio`, `Codigo_Postal`, `Telefono`, `Email`, `Fecha_Alta`, `Estado`, `ROL`) VALUES ('$dni', '$nombre', '$apellido1', '$apellido2', '$fecha_nacimiento', '$localidad', '$domicilio', '$codigo_postal', '$telefono', '$email', '$fecha_alta', 'Activo', 'Socio')";
        
        if(mysqli_query($conn, $sql)) {
            $_SESSION['mensaje'] = "Socio dado de alta correctamente";
            $_SESSION['tipo_mensaje'] = "success";
        }
    } catch (mysqli_sql_exception $e) {
        if(strpos($e->getMessage(), 'Duplicate entry') !== false) {
            $_SESSION['mensaje'] = "Error: El DNI $dni ya existe en la base de datos";
            $_SESSION['tipo_mensaje'] = "error";
        } else {
            $_SESSION['mensaje'] = "Error al dar de alta al socio: " . $e->getMessage();
            $_SESSION['tipo_mensaje'] = "error";
        }
    }
}

//MODIFICAR ESTADO DE SOCIO
function modificarestadosocio($conn, $dni, $nombre, $estado){
    $sql = "SELECT * FROM socios WHERE DNI = '$dni' AND Nombre = '$nombre'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $sql = "UPDATE socios SET Estado = '$estado' WHERE DNI = '$dni' AND Nombre = '$nombre';";
        $result = mysqli_query($conn, $sql);
        if($result){
            $_SESSION['mensaje'] = "El socio ha sido dado de baja correctamente";
            $_SESSION['tipo_mensaje'] = "success";
            return true;
        } else {
            $_SESSION['mensaje'] = "Error al dar de baja al socio";
            $_SESSION['tipo_mensaje'] = "error";
            return false;
        }
    } else {
        $_SESSION['mensaje'] = "El socio no existe";
        $_SESSION['tipo_mensaje'] = "error";
        return false;
    }
}

// FILTRO DE SOCIOS

function buscarsocios($conn){
    // UTILIZAMOS EL 1=1 PARA QUE LA CONDICION SIEMPRE SEA VALIDA
    
    $sql = "SELECT * FROM socios WHERE 1=1";

            // FILTROS
            if(!empty($_POST["id"])){
                $sql .= " AND ID_Socio = ".$_POST["id"];
            }
            if(!empty($_POST["dni"])){
                $sql.= " AND DNI = ".$_POST["dni"]."'";
            }
            if(!empty($_POST["nombre"])){
                $sql.= " AND Nombre = '".$_POST["nombre"]."'";
            }
            if(!empty($_POST["estado"])){
                $sql.= " AND Estado = '".$_POST["estado"]."'";
            }
            if(!empty($_POST["rol"])){
                $sql.= " AND ROL = '".$_POST["rol"]."'";
            }
            if(!empty($_POST["apellido1"])){
                $sql.= " AND Apellido1 = '".$_POST["apellido1"]."'";
            }
            if(!empty($_POST["apellido2"])){
                $sql.= " AND Apellido2 = '".$_POST["apellido2"]."'";
            }
            if(!empty($_POST["fecha_nacimiento"])){
                $sql.= " AND Fecha_Nacimiento = '".$_POST["fecha_nacimiento"]."'";
            }
            if(!empty($_POST["localidad"])){
                $sql.= " AND Localidad = '".$_POST["localidad"]."'";
            }
            if(!empty($_POST["telefono"])){
                $sql.= " AND Telefono = '".$_POST["telefono"]."'";
            }
            if(!empty($_POST["email"])){
                $sql.= " AND Email = '".$_POST["email"]."'";
            }
            if(!empty($_POST["fecha_alta"])){
                $sql.= " AND Fecha_Alta = '".$_POST["fecha_alta"]."'";
            }
            if(!empty($_POST["fecha_baja"])){
                $sql.= " AND Fecha_Baja = '".$_POST["fecha_baja"]."'";
            }
            if(!empty($_POST["codigo_postal"])){
                $sql.= " AND Codigo_Postal = '".$_POST["codigo_postal"]."'";
            }
            if(!empty($_POST["domicilio"])){
                $sql.= " AND Domicilio = '".$_POST["domicilio"]."'";
            }


            $result = mysqli_query($conn, $sql);

            //TABLA DE RESULTADOS
            if($result && mysqli_num_rows($result) > 0){
                echo "<table border='1' cellpadding='5' cellspacing='0'>";
                echo "<tr>
                    <th>ID</th>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido1</th>
                    <th>Apellido2</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Localidad</th>
                    <th>Domicilio</th>
                    <th>Código Postal</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha de Alta</th>
                    <th>Fecha de Baja</th>
                    <th>Estado</th>
                    <th>ROL</th>
                </tr>";

                //REPETIMOS LA MUESTRA DE LA TABLA CON BUCLE WHILE

                while($row = mysqli_fetch_assoc($result)){
                    
                    echo "<tr>
                        <td>".$row['ID_Socio']."</td>
                        <td>".$row['DNI']."</td>
                        <td>".$row['Nombre']."</td>
                        <td>".$row['Apellido1']."</td>
                        <td>".$row['Apellido2']."</td>
                        <td>".$row['Fecha_Nacimiento']."</td>
                        <td>".$row['Localidad']."</td>
                        <td>".$row['Domicilio']."</td>
                        <td>".$row['Codigo_Postal']."</td>
                        <td>".$row['Telefono']."</td>
                        <td>".$row['Email']."</td>
                        <td>".$row['Fecha_Alta']."</td>
                        <td>".$row['Fecha_Baja']."</td>
                        <td>".$row['Estado']."</td>
                        <td>".$row['ROL']."</td>
                    </tr>";
                }
                echo "<table>";
            } else {
                echo "No se encontraron resultados";
            }
}


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
            
            echo "<script>window.location.href = './subpáginas/admin/gestion/actualizar_socio1.php';</script>";
            exit();
        }
        else{
            $_SESSION["Error"] = "El socio no existe";
        }
    }
}
function actualizarsocio2 ($conn, $id_socio){
    $sql = "SELECT * FROM socios WHERE ID_Socio = '$id_socio'";
    $result = mysqli_query($conn, $sql);
     if(mysqli_num_rows($result) > 0){
         while($row = mysqli_fetch_assoc($result)){
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            echo "<tr>
                <td>".$row['ID_Socio']."</td>
                <td>".$row['DNI']."</td>
                <td>".$row['Nombre']."</td>
                <td>".$row['Apellido1']."</td>
                <td>".$row['Apellido2']."</td>
                <td>".$row['Fecha_Nacimiento']."</td>
                <td>".$row['Localidad']."</td>
                <td>".$row['Domicilio']."</td>
                <td>".$row['Codigo_Postal']."</td>
                <td>".$row['Telefono']."</td>
                <td>".$row['Email']."</td>
                <td>".$row['Fecha_Alta']."</td>
                <td>".$row['Fecha_Baja']."</td>
                <td>".$row['Estado']."</td>
                <td>".$row['ROL']."</td>
            </tr>";
         }
     }
}
/*
session_start();
session_destroy();
header('Location: login.php');
exit();
*/

?>