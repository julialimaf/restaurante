<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "restaurante";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $cpf = $_POST['cpf'];

    $check = "SELECT * FROM usuarios WHERE cpf = '$cpf' OR email = '$email'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        $mensagem = "CPF ou e-mail já cadastrados!";
    } else {
        $sql = "INSERT INTO usuarios (nome_usuario, senha_usuario, cpf, email)
                VALUES ('$nome', '$senha', '$cpf', '$email')";

        if ($conn->query($sql) === TRUE) {
            $mensagem = "Cadastro realizado com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar.";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Inovador</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(120deg, #7d1116, #c79c22);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form {
            background-color: #fff;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: relative;
        }

        .form h2 {
            margin: 0;
            color: #7d1116;
            text-align: center;
        }

        .input-group {
            display: flex;
            flex-direction: column;
        }

        .input-group label {
            margin-bottom: 5px;
            color: #7d1116;
            font-weight: bold;
        }

        .input-group input {
            padding: 12px;
            border: 2px solid #c79c22;
            border-radius: 10px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .input-group input:focus {
            outline: none;
            border-color: #7d1116;
        }

        .button-submit {
            background-color: #c79c22;
            color: white;
            font-weight: bold;
            font-size: 16px;
            border: none;
            padding: 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .button-submit:hover {
            background-color: #7d1116;
        }

        .mensagem {
            text-align: center;
            font-weight: bold;
            padding: 10px;
            border-radius: 10px;
        }

        .mensagem.sucesso {
            background-color: #c79c22;
            color: white;
        }

        .mensagem.erro {
            background-color: #7d1116;
            color: white;
        }
        .logo-container {
    position: absolute;
    top: 30px;
    display: flex;
    justify-content: center;
    width: 100%;
}

.logo {
    width: 120px;
    height: auto;
    filter: drop-shadow(2px 4px 6px rgba(0,0,0,0.3));
}

    </style>
</head>
<body>
<div class="logo-container">
    <img src="logo.png" alt="Logo" class="logo">
</div>

<form class="form" method="POST" action="">
    <h2>Crie sua conta</h2>

    <?php if (!empty($mensagem)): ?>
        <div class="mensagem <?= strpos($mensagem, 'sucesso') !== false ? 'sucesso' : 'erro' ?>">
            <?= $mensagem ?>
        </div>
    <?php endif; ?>

    <div class="input-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required>
    </div>

    <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div class="input-group">
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required>
    </div>

    <div class="input-group">
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" placeholder="xxx.xxx.xxx-xx" required>
    </div>

    <button class="button-submit" type="submit">Criar Conta</button>
    <center>
    <p class="p">Você é um administrador? <span class="span"><a href="login_adm.php">Ir para o Workbench</a></span></p></center>
</form>

</body>
</html>
