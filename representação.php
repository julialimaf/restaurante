<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf_usuario = $_POST['cpf_usuario'];
    $num_mesa = $_POST['num_mesa'];
    $data_hora = $_POST['data_hora'];

    // Consultar no banco de dados para verificar se o CPF existe
    // Aqui, o CPF do banco é comparado com o CPF do formulário incluindo pontos e traços
    $sql = "SELECT id_usuario FROM usuarios WHERE cpf = '$cpf_usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // CPF encontrado, fazer a reserva
        $id_usuario = $result->fetch_assoc()['id_usuario'];

        // Verificar se a data e hora estão corretas
        $data_selecionada = date('Y-m-d H:i:s', strtotime($data_hora));
        $hora = date('H', strtotime($data_hora));

        if (strtotime($data_selecionada) >= strtotime('today') && $hora >= 12 && $hora <= 23) {
            // Inserir a reserva no banco de dados
            $sql = "INSERT INTO reservas (num_mesa, id_usuario_fk, data_hora) VALUES ('$num_mesa', '$id_usuario', '$data_selecionada')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Reserva feita com sucesso!');</script>";
            } else {
                echo "Erro: " . $conn->error;
            }
        } else {
            echo "<script>alert('Escolha um horário entre 12:00 e 23:00 e uma data válida.');</script>";
        }
    } else {
        // CPF não encontrado, mensagem de erro
        echo "<script>alert('CPF não encontrado. Por favor, faça o cadastro.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Reserva Restaurante</title>
    <style>
          body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background-image: url('https://cdn.pixabay.com/photo/2017/02/07/14/32/floor-2040304_1280.jpg');
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }
        .restaurante {
            position: relative;
            width: 100vw;
            height: 100vh;
        }
        .bar {
            top: 0;
            margin-left: 500px;
            width: 800px;
            height: 60px;
            background: #5d4037;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }

        .janela {
            position: absolute;
            width: 40px;
            height: 700px;
            background: #bbdefb;
            color: #0d47a1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            writing-mode: vertical-rl;
            border: 2px solid #64b5f6;
            border-radius: 8px;
            box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
        }
        .janela.esquerda { top: 100px; left: 10px; }
        .janela.direita { top: 100px; right: 10px; }

        .porta {
            position: absolute;
            right: 10px;
            bottom: 10px;
            width: 40px;
            height: 140px;
            background: #6d4c41;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            writing-mode: vertical-rl;
            font-size: 12px;
            border-radius: 6px;
            box-shadow: inset 0 0 4px rgba(0,0,0,0.3);
        }

        .mesa {
            position: absolute;
            width: 150px;
            height: 100px;
            background: #800000;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border-radius: 50%;
            box-shadow: 0 0 6px rgba(0,0,0,0.3);
            cursor: pointer;
            transition: 0.3s ease;
        }
        .mesa:hover {
            transform: scale(1.05);
            background: #a52a2a;
        }
        .mesa.retangular {
            width: 180px;
            height: 60px;
            border-radius: 10px;
        }
        .reserva-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            display: none;
            width: 300px;
            text-align: center;
        }
        .reserva-popup h3 {
            margin-bottom: 15px;
        }
        .reserva-popup input,
        .reserva-popup button {
            margin: 10px 0;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .reserva-popup button {
            background-color: #800000;
            color: white;
            font-weight: bold;
            border: none;
        }
        .reserva-popup button:hover {
            background-color: #a52a2a;
        }
    </style>
    </style>
</head>
<body>
    <div class="restaurante">
        <div class="bar">Bar</div>
        <div class="janela esquerda">Janela</div>
        <div class="janela direita">Janela</div>
        <div class="porta">Porta</div>

        <!-- Mesas interativas -->
        <div class="mesa" style="top: 90px; left: 80px;" onclick="abrirReserva(1)">1</div>
        <div class="mesa" style="top: 300px; left: 100px;" onclick="abrirReserva(2)">2</div>
        <div class="mesa" style="top: 200px; left: 520px;" onclick="abrirReserva(3)">3</div>
        <div class="mesa" style="top: 400px; left: 400px;" onclick="abrirReserva(4)">4</div>
        <div class="mesa" style="top: 150px; right: 500px;" onclick="abrirReserva(5)">5</div>
        <div class="mesa" style="top: 280px; right: 200px;" onclick="abrirReserva(6)">6</div>
        <div class="mesa" style="top: 700px; right: 500px;" onclick="abrirReserva(7)">7</div>
        <div class="mesa" style="top: 650px; left: 220px;" onclick="abrirReserva(8)">8</div>
        <div class="mesa" style="top: 650px; left: 540px;" onclick="abrirReserva(9)">9</div>
        <div class="mesa" style="top: 600px; right: 800px;" onclick="abrirReserva(10)">10</div>

        <!-- Popup para reserva -->
        <div class="reserva-popup" id="reservaPopup">
            <h3>Faça sua Reserva</h3>
            <form method="POST">
                <input type="text" name="cpf_usuario" placeholder="Digite seu CPF (com pontos e traços)" required>
                <input type="datetime-local" name="data_hora" required id="dataHoraInput">
                <input type="hidden" name="num_mesa" id="numMesaInput">
                <button type="submit">Reservar</button>
            </form>
            <button onclick="fecharReserva()">Fechar</button>
        </div>
    </div>

    <script>
        function abrirReserva(numMesa) {
            document.getElementById('numMesaInput').value = numMesa;
            document.getElementById('reservaPopup').style.display = 'block';

            // Define o valor mínimo para a data (não pode ser no passado)
            const agora = new Date();
            const hoje = new Date(agora.getFullYear(), agora.getMonth(), agora.getDate(), 12, 0, 0);
            const min = hoje.toISOString().slice(0, 16);
            document.getElementById('dataHoraInput').min = min;
        }

        function fecharReserva() {
            document.getElementById('reservaPopup').style.display = 'none';
        }
    </script>
</body>
</html>
