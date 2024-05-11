<?php
require("../connection/DBconn.php");
$nom = $_POST['sala'];
$pis = $_POST['pis'];

if (isset($_POST['sala']) || isset($_POST['pis'])) {
    $connexio = connecta("demom14");

    // Corrige la sintaxis de la consulta SQL
    $sql = "INSERT INTO sales(nom, pis) VALUES ('" . $nom . "', '" . $pis . "');";

    $resultat = $connexio->query($sql);
    echo $sql;

    // Verifica si la inserción fue exitosa antes de redirigir
    if ($resultat) {
        desconnecta($connexio);

        // Redirige después de la inserción exitosa
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error en la inserción: " . $connexio->error;
    }
}
?>
