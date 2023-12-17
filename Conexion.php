 <?php

    $host = "localhost";
    $User = "root";
    $pass = "rootroot";

    $db = "dbtaxis";
    $conexion = mysqli_connect($host,$User,$pass,$db);

    if (!$conexion) {
        echo "conexion fallida";
    }


