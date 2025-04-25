<?php
include_once("conn.php");


if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $contraseña = $_POST["password"];
    
    
    function iniciosesion($conn, $usuario, $contraseña) {
        $sql = "SELECT * FROM usuarios WHERE username = '$usuario'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo "El nombre de usuario no existe";
            return;
        }else{
            $sql1 = "SELECT * FROM usuarios WHERE password = '$contraseña' ";
            $result1 = mysqli_query($conn, $sql1);
            if($result1 && mysqli_num_rows($result1) == 0){
                echo "Error: contraseña incorrecta";
            } else {
                echo "Has iniciado sesión correctamente";
                exit();
            }
        }
    }

}
?>

