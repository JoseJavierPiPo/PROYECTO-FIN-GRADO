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
            $_SESSION["error"] = $nombreno;
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
        $_SESSION["error"] = "Por favor, complete todos los campos.";
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
    
    try{
        $sql = "INSERT INTO `socios` (`DNI`, `Nombre`, `Apellido1`, `Apellido2`, `Fecha_Nacimiento`, `Localidad`, `Domicilio`, `Codigo_Postal`, `Telefono`, `Email`, `Fecha_Alta`, `Estado`, `ROL`) VALUES ('$dni', '$nombre', '$apellido1', '$apellido2', '$fecha_nacimiento', '$localidad', '$domicilio', '$codigo_postal', '$telefono', '$email', '$fecha_alta', 'Activo', 'Socio')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $_SESSION["correcto"] = "Socio insertado correctamente";
        }
    }
    catch(mysqli_sql_exception $e){
        $_SESSION["error"] = "Error al insertar el socio: ". mysqli_error($conn);
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
            $_SESSION['correcto'] = "El socio ha sido dado de baja correctamente";
        } else {
            $_SESSION['error'] = "Error al dar de baja al socio";
        }
    } else {
        $_SESSION['error'] = "El socio no existe";
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


 function nuevamodalidad($conn, $nombre, $descripcion, $temporada_inicio, $temporada_fin, $tipo_caza) {
    if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["temporada_inicio"]) && isset($_POST["temporada_fin"]) && isset($_POST["tipo_caza"]) && isset($_POST["permiso_especial"]) && isset($_POST["arma"])) {
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $temporada_inicio = $_POST["temporada_inicio"];
        $temporada_fin = $_POST["temporada_fin"];
        $tipo_caza = $_POST["tipo_caza"];
        $permiso_especial = $_POST["permiso_especial"];
        $arma = $_POST["arma"];
      
        try{
            $sql = "INSERT INTO `modalidades_caza` (`ID_Modalidad`, `Nombre_Modalidad`, `Descripcion`, `Temporada_Inicio`, `Temporada_Fin`, `Tipo_Caza`, `Arma_Predominante`, `Requiere_Permiso_Especial`) VALUES ('', '$nombre', '$descripcion', '$temporada_inicio', '$temporada_fin', '$tipo_caza', '$arma', '$permiso_especial')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION["correcto"] = "Modalidad insertada correctamente";
            } else {
                $_SESSION["error"] = mysqli_error($conn);
            }
        }
        catch(mysqli_sql_exception $e){
            $_SESSION["error"] = "Error al insertar la modalidad: ". mysqli_error($conn);
        }
    }
 }

 function borrarmodalidad ($conn, $nombre, $id_modalidad) {
    if(isset($_POST["nombre"]) && isset($_POST["id_modalidad"])) {
        $nombre = $_POST["nombre"];
        $id_modalidad = $_POST["id_modalidad"];
        
        $sql1 = "SELECT * FROM `modalidades_caza` WHERE ID_Modalidad = '$id_modalidad' AND Nombre_Modalidad = '$nombre'";
        $result1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result1) === 0){
            $_SESSION["error"] = "No exite modalidad con ID $id_modalidad y Nombre $nombre";
        }
        else{
            try{
                $sql = "DELETE FROM `modalidades_caza` WHERE ID_Modalidad = '$id_modalidad' AND Nombre_Modalidad = '$nombre'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $_SESSION["correcto"] = "Modalidad borrada correctamente";
                } else {
                    $_SESSION["error"] = mysqli_error($conn);
                }
            }
            catch(mysqli_sql_exception $e){
                $_SESSION["error"] = "Error al borrar la modalidad (comprueba si existe): ". mysqli_error($conn);
            }
        }

    }
 }

 function listarmodalidades($conn) {
     try {
         $sql = "SELECT * FROM modalidades_caza WHERE 1=1";

         // Añadir filtros si se han enviado
         if(!empty($_POST["id_modalidad"])) {
             $sql .= " AND ID_Modalidad = '".$_POST["id_modalidad"]."'";
         }
         if(!empty($_POST["nombre"])) {
             $sql .= " AND Nombre_Modalidad = '".$_POST["nombre"]."'";
         }
         if(!empty($_POST["descripcion"])) {
             $sql .= " AND Descripcion LIKE '%".$_POST["descripcion"]."%'";
         }
         if(!empty($_POST["estado"])) {
             $sql .= " AND Tipo_Caza = '".$_POST["estado"]."'";
         }
         if(!empty($_POST["temporada_inicio"])) {
             $sql .= " AND Temporada_Inicio = '".$_POST["temporada_inicio"]."'";
         }
         if(!empty($_POST["temporada_fin"])) {
             $sql .= " AND Temporada_Fin = '".$_POST["temporada_fin"]."'";
         }
         if(!empty($_POST["arma"])) {
             $sql .= " AND Arma_Predominante = '".$_POST["arma"]."'";
         }
         if(!empty($_POST["permiso_especial"])) {
             $sql .= " AND Requiere_Permiso_Especial = '".$_POST["permiso_especial"]."'";
         }

         $result = mysqli_query($conn, $sql);

         if($result && mysqli_num_rows($result) > 0) {
             echo "<table border='1' cellpadding='5' cellspacing='0'>";
             echo "<tr>
                         <th>ID</th>
                         <th>Nombre</th>
                         <th>Descripción</th>
                         <th>Temporada Inicio</th>
                         <th>Temporada Fin</th>
                         <th>Tipo de Caza</th>
                         <th>Arma Predominante</th>
                         <th>Requiere Permiso</th>
                     </tr>";
                 while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['ID_Modalidad']}</td>
                        <td>{$row['Nombre_Modalidad']}</td>
                        <td>{$row['Descripcion']}</td>
                        <td>{$row['Temporada_Inicio']}</td>
                        <td>{$row['Temporada_Fin']}</td>
                        <td>{$row['Tipo_Caza']}</td>
                        <td>{$row['Arma_Predominante']}</td>
                        <td>{$row['Requiere_Permiso_Especial']}</td>
                    </tr>";
                 }
                 echo "</table>";
             } else {
                $_SESSION['error'] = "No se encontraron resultados";
            }
         } catch(mysqli_sql_exception $e) {
            $_SESSION["error"] = mysqli_error($conn);
        }
}
 

/*
session_start();
session_destroy();
header('Location: login.php');
exit();
*/

?>