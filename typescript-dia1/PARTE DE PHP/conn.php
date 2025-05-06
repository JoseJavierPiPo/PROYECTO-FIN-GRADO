<?php
$conn = mysqli_connect("localhost", "root", "", "cazadores_bd");

if (!$conn){
    die("Error de conexión". mysqli_connect_error());
}else{
    
}
$script_path = "estructura.sql";
$script = file_get_contents("estructura.sql");
if (mysqli_multi_query($conn, $script)) {
    do {
        if ($result = mysqli_store_result($conn)) {
            mysqli_free_result($result);
        }
    } while (mysqli_next_result($conn));
} else {
    echo "Error ejecutando el script: " . mysqli_error($conn);
}
?>