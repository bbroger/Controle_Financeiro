<?php

    $host = "localhost";
    $usr = "root";
    $bd = "controle_financeiro";
    $link = mysqli_connect($host, $usr, "", $bd);
    //echo "conexa.php integrada com sucesso";
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
?>