
<?php
require("../connection/DBconn.php");

if (isset($_POST['rmsala'])) {
    $sala = $_POST['rmsala'];

    $connexio = connecta("demom14");

    // Obtener el ID asociado al nombre de la sala usando una sentencia preparada
    $findid_query = "SELECT ID FROM sales WHERE nom = ?";
    $stmt = $connexio->prepare($findid_query);
    $stmt->bind_param("s", $sala);
    $stmt->execute();
    $resultatid = $stmt->get_result();

    // Verificar si se encontró un ID
    if ($resultatid->num_rows > 0) {
        $fila = $resultatid->fetch_assoc();
        $id_a_borrar = $fila['ID'];

        // Ahora eliminamos el registro con el ID obtenido
        $delete_query = "DELETE FROM sales WHERE ID = ?";
        $stmt = $connexio->prepare($delete_query);
        $stmt->bind_param("i", $id_a_borrar);
        $resultat = $stmt->execute();

        if ($resultat) {
            header("Location: ../index.php");
        } else {
            echo "Error al eliminar el registro: " . $stmt->error;
        }
    } else {
        echo "No se encontró un registro con el nombre de sala proporcionado.";
    }

    desconnecta($connexio);
} else {
    echo "Falta el parámetro 'sala' en la solicitud.";
}
?>
