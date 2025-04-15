<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mesa_id = intval($_POST['mesa_id']);
    $data_reserva = $_POST['data_reserva'];
    $tipo_evento = $_POST['tipo_evento'];

    // Atualiza a reserva
    $conn->query("UPDATE mesas SET reservada = 1, data_reserva = '$data_reserva', tipo_evento = '$tipo_evento' WHERE id = $mesa_id");

    // Pega os dados atualizados para mostrar o extrato
    $mesa = $conn->query("SELECT * FROM mesas WHERE id = $mesa_id")->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reserva Confirmada</title>
</head>
<body>
    <h1>Reserva Confirmada!</h1>
    <p><strong>Mesa:</strong> <?= $mesa['numero'] ?></p>
    <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($mesa['data_reserva'])) ?></p>
    <p><strong>Evento:</strong> <?= $mesa['tipo_evento'] ?></p>
    <a href="index.php">Voltar ao início</a>
</body>
</html>
