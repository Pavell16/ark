<?php

function connecta($database)
{
    $servername = "localhost";

    // validar usuari conectat i agafar credencials
    // if (isset($_POST['username']) == "admin" || isset($_SESSION['user']) == "admin") {
    //     include("../credentials/admin.php");
    // } else {
    //     include("../credentials/mundane.php");
    // }
    $username="root";
    $password="";

    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connexio
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}

function desconnecta($conn)
{
    $conn->close();
}