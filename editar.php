<?php
include 'conexao.php';

// Verifica se o ID foi passado pela URL
if (isset($_GET['id'])) {
    $id_reserva = $_GET['id'];

    // Consulta para obter os dados atuais da reserva
    $sql = "SELECT * FROM reservas WHERE id_reserva = $id_reserva";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $reserva = $result->fetch_assoc();
    } else {
        echo "Reserva não encontrada!";
        exit;
    }
} else {
    echo "ID não fornecido!";
    exit;
}

// Processa a edição quando o formulário é enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num_mesa = $_POST['num_mesa'];
    $data_reserva = $_POST['data_reserva'];

    // Atualiza a reserva no banco de dados
    $update_sql = "UPDATE reservas SET num_mesa = '$num_mesa', data_reserva = '$data_reserva' WHERE id_reserva = $id_reserva";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Reserva atualizada com sucesso!'); window.location.href = 'admin.php';</script>";
    } else {
        echo "Erro ao atualizar reserva: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Editar Reserva</h2>
    
    <form method="POST">
        <div class="mb-3">
            <label for="num_mesa" class="form-label">Número da Mesa</label>
            <input type="number" class="form-control" id="num_mesa" name="num_mesa" value="<?= $reserva['num_mesa'] ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="data_reserva" class="form-label">Data da Reserva</label>
            <input type="date" class="form-control" id="data_reserva" name="data_reserva" value="<?= $reserva['data_reserva'] ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar Reserva</button>
    </form>
</div>
</body>
</html>
