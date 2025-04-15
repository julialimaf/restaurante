<?php
include "conexao.php";

// Inicialização dos arrays para armazenar as comidas
$entradas = [];
$principais = [];
$sobremesas = [];

// Consulta SQL que inclui a tabela de imagens
$sql = "SELECT 
            c.id_comida,
            c.nome_comida, 
            c.valor_comida,
            i.caminho AS caminho_imagem
        FROM comida c
        LEFT JOIN imagens i ON c.id_comida = i.comida_id_comida
        GROUP BY c.id_comida";

$result = $conn->query($sql);

$comidas = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $comidas[] = $row;
    }
} else {
    $comidas[] = [
        'id_comida' => '-', 
        'nome_comida' => 'Nenhuma comida encontrada', 
        'valor_comida' => '-', 
        'caminho_imagem' => ''
    ];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f1f1;
            color: #333;
            line-height: 1.6;
            padding: 0 20px;
        }

        header {
            background-color: #7d1116;
            color: #fff;
            padding: 40px 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .tamanho{
            width: 100%;
        }

        h1 {
            font-size: 48px;
            letter-spacing: 2px;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 40px;
        }

        .menu-category {
            margin-bottom: 50px;
            width: 100%;
            max-width: 1200px;
        }

        .menu-category h2 {
            font-size: 36px;
            color: #7d1116;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .menu-items {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
            gap: 40px;
        }

        .menu-item {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            width: 250px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .menu-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border: 2px solid #c79c22;
        }

        .menu-item img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .menu-item .nome {
            font-size: 22px;
            font-weight: bold;
            color: #7d1116;
            margin-bottom: 10px;
        }

        .menu-item .preco {
            font-size: 18px;
            color: #c79c22;
            font-weight: bold;
        }

        .footer {
            background-color: #7d1116;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .menu-items {
                justify-content: center;
            }

            .menu-item {
                width: 200px;
                margin-bottom: 30px;
            }

            h1 {
                font-size: 36px;
            }

            .menu-category h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

<header class="tamanho">
    <h1>Cardápio</h1>
</header>

<main>

    <section class="menu-category">
        <h2>Entradas</h2>
        <div class="menu-items">
            <?php foreach ($comidas as $comida) : ?>
                <div class="menu-item">
                    <!-- Aqui verificamos se a imagem existe -->
                    <?php if (!empty($comida['caminho_imagem']) && file_exists($comida['caminho_imagem'])) : ?>
                        <img src="<?= $comida['caminho_imagem'] ?>" alt="<?= $comida['nome_comida'] ?>">
                    <?php else : ?>
                        <img src="default_image.jpg" alt="Imagem não disponível">
                    <?php endif; ?>
                    <div class="nome"><?= $comida['nome_comida'] ?></div>
                    <div class="preco"><?= $comida['valor_comida'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</main>

<div class="footer">
    <p>&copy; 2025 Restaurante. Todos os direitos reservados.</p>
</div>

</body>
</html>
