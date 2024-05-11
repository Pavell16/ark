<?php
require("../connection/DBconn.php");

if (isset($_POST['usuari']) && isset($_POST['contra'])) {
    $usuari = $_POST['usuari'];
    $contra = $_POST['contra'];

    $connexio = connecta("demom14");

    // Utiliza sentencia preparada para evitar inyección SQL
    $sql = "INSERT INTO users (usuari, passwd, hora_creacio) VALUES (?, ?, current_timestamp())";

    $stmt = $connexio->prepare($sql);
    $stmt->bind_param("ss", $usuari, $contra);
    $resultat = $stmt->execute();

    // Verifica si la inserción fue exitosa antes de redirigir
    if ($resultat) {
        desconnecta($connexio);

        // Redirige después de la inserción exitosa
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error en la inserción: " . $stmt->error;
    }
} else {
    echo "Faltan parámetros en la solicitud.";
}
?>
