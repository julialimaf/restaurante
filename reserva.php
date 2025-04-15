<?php
include 'conexao.php';

if (!isset($_GET['mesa'])) {
    echo "Mesa inválida.";
    exit;
}

$mesa_id = intval($_GET['mesa']);
$mesa = $conn->query("SELECT * FROM mesas WHERE id = $mesa_id")->fetch_assoc();

if ($mesa['reservada']) {
    echo "Mesa já reservada!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservar Mesa <?= $mesa['numero'] ?></title>
</head>
<body>
    <h1>Reserva da Mesa <?= $mesa['numero'] ?></h1>
    <form action="confirmar.php" method="post">
        <input type="hidden" name="mesa_id" value="<?= $mesa['id'] ?>">

        <label>Data da Reserva:</label><br>
        <input type="date" name="data_reserva" required><br><br>

        <label>Tipo de Evento:</label><br>
        <select name="tipo_evento" required>
            <option value="">-- Selecione --</option>
            <option value="Aniversário">Aniversário</option>
            <option value="Casamento">Casamento</option>
            <option value="Reunião">Reunião</option>
            <option value="Outros">Outros</option>
        </select><br><br>

        <button type="submit">Confirmar Reserva</button>
    </form>
</body>
</html>
