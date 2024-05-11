<?php
require("../connection/DBconn.php");

if (isset($_POST['motiu'])) {
    $motiu = $_POST['motiu'];

    $connexio = connecta("demom14");

    // Utiliza una sentencia preparada para la inserción
    $sql = "INSERT INTO motius(motiu) VALUES (?)";
    $stmt = $connexio->prepare($sql);
    $stmt->bind_param("s", $motiu);

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
    echo "Falta el parámetro 'motiu' en la solicitud.";
}
?>
