<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "supermercado_online";
$conexion = new mysqli($hostname,$username,$password,$database);

if ($conexion -> connect_errno){
     echo "Error al conectar a la base de datos ($conexion->connect_errno): " . $conexion->connect_error;

}else {
    echo "Conectado correctamente a la base de datos: $database";
}

?>