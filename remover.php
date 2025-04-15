<?php
include 'conexao.php';

// Verifica se o ID foi passado pela URL
if (isset($_GET['id'])) {
    $id_reserva = $_GET['id'];

    // Deleta a reserva no banco de dados
    $sql = "DELETE FROM reservas WHERE id_reserva = $id_reserva";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Reserva removida com sucesso!'); window.location.href = 'admin.php';</script>";
    } else {
        echo "Erro ao remover reserva: " . $conn->error;
    }
}

$conn->close();
?>
