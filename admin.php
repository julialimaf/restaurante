<?php
include 'conexao.php';

// Consulta com JOIN
$sql = "SELECT 
            r.id_reserva,
            u.nome_usuario, 
            r.data_reserva, 
            r.num_mesa 
        FROM reservas r
        INNER JOIN usuarios u ON r.id_usuario_fk = u.id_usuario";

$result = $conn->query($sql);

$reservas = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reservas[] = $row;
    }
} else {
    $reservas[] = [
        'id_reserva' => '-', 
        'nome_usuario' => 'Nenhuma reserva encontrada', 
        'data_reserva' => '-', 
        'num_mesa' => '-'
    ];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Lista de Reservas</h2>
    
    <!-- Botão de Adicionar -->
    <a href="adicionar.php" class="btn btn-success mb-3">+ Adicionar Reserva</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Data da Reserva</th>
                <th>Mesa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $index => $reserva): ?>
            <tr>
                <th scope="row"><?= $index + 1 ?></th>
                <td><?= htmlspecialchars($reserva['nome_usuario']) ?></td>
                <td><?= date('d/m/Y', strtotime($reserva['data_reserva'])) ?></td>
                <td><?= htmlspecialchars($reserva['num_mesa']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $reserva['id_reserva'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="remover.php?id=<?= $reserva['id_reserva'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja remover esta reserva?')">Remover</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
