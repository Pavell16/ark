<?php
require("../connection/DBconn.php");

if (isset($_POST['motiu']) && isset($_POST['sala']) && isset($_POST['usuari'])) {
    $usuari = $_POST['usuari'];
    $motiu = $_POST['motiu'];
    $sala = $_POST['sala'];

    $connexio = connecta("demom14");

    // Obtener ID del usuario
    $sqluser = "SELECT ID FROM users WHERE usuari = ?";
    $stmt_user = $connexio->prepare($sqluser);
    $stmt_user->bind_param("s", $usuari);
    $stmt_user->execute();
    $resultat_usuari = $stmt_user->get_result();

    // Obtener ID del motivo
    $sqlmotiu = "SELECT ID FROM motius WHERE motiu = ?";
    $stmt_motiu = $connexio->prepare($sqlmotiu);
    $stmt_motiu->bind_param("s", $motiu);
    $stmt_motiu->execute();
    $resultat_motiu = $stmt_motiu->get_result();

    // Obtener ID de la sala
    $sqlsala = "SELECT ID FROM sales WHERE nom = ?";
    $stmt_sala = $connexio->prepare($sqlsala);
    $stmt_sala->bind_param("s", $sala);
    $stmt_sala->execute();
    $resultat_sala = $stmt_sala->get_result();

    // Verificar si las consultas fueron exitosas antes de proceder con la inserción
    if ($resultat_usuari->num_rows > 0 && $resultat_motiu->num_rows > 0 && $resultat_sala->num_rows > 0) {
        $fila_usuari = $resultat_usuari->fetch_assoc();
        $fila_motiu = $resultat_motiu->fetch_assoc();
        $fila_sala = $resultat_sala->fetch_assoc();

        // Obtener los IDs necesarios
        $id_usuari = $fila_usuari['ID'];
        $id_motiu = $fila_motiu['ID'];
        $id_sala = $fila_sala['ID'];

        // Insertar en la tabla fitxa usando sentencia preparada
        $sql_insert = "INSERT INTO fitxa(usuari, motiu, sala, temps_fitxa) VALUES (?, ?, ?, current_timestamp())";
        $stmt_insert = $connexio->prepare($sql_insert);
        $stmt_insert->bind_param("iii", $id_usuari, $id_motiu, $id_sala);
        $resultat_insert = $stmt_insert->execute();

        if ($resultat_insert) {
            desconnecta($connexio);
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error en la inserción: " . $stmt_insert->error;
        }
    } else {
        echo "No se encontraron registros con los nombres proporcionados.";
    }
} else {
    echo "Faltan parámetros en la solicitud.";
}
?>
