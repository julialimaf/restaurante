<?php
include 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario_fk = $_POST['id_usuario_fk']; // ID do usuário
    $num_mesa = $_POST['num_mesa']; // Número da mesa
    $data_reserva = $_POST['data_reserva']; // Data da reserva (formato YYYY-MM-DD)

    // Insere no banco de dados
    $sql = "INSERT INTO reservas (id_usuario_fk, num_mesa, data_reserva) 
            VALUES ('$id_usuario_fk', '$num_mesa', '$data_reserva')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Reserva adicionada com sucesso!'); window.location.href = 'admin.php';</script>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Adicionar Nova Reserva</h2>

    <!-- Formulário de Adicionar -->
    <form method="POST" action="adicionar.php">
        <div class="mb-3">
            <label for="id_usuario_fk" class="form-label">Selecione o Cliente</label>
            <select class="form-select" id="id_usuario_fk" name="id_usuario_fk" required>
                <?php
                // Carregar todos os usuários para escolher no formulário
                include 'conexao.php';
                $usuarios_result = $conn->query("SELECT id_usuario, nome_usuario FROM usuarios");

                if ($usuarios_result->num_rows > 0) {
                    while($usuario = $usuarios_result->fetch_assoc()) {
                        echo "<option value='" . $usuario['id_usuario'] . "'>" . $usuario['nome_usuario'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="num_mesa" class="form-label">Número da Mesa</label>
            <input type="number" class="form-control" id="num_mesa" name="num_mesa" required>
        </div>

        <div class="mb-3">
            <label for="data_reserva" class="form-label">Data da Reserva</label>
            <input type="date" class="form-control" id="data_reserva" name="data_reserva" required>
        </div>

        <button type="submit" class="btn btn-success">Adicionar Reserva</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
