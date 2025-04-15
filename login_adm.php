<?php
session_start();
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $senha = $_POST['senha'];

    $conn = new mysqli("localhost", "root", "", "restaurante");

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM adm WHERE tipo_adm = '$tipo' AND senha_adm = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION['admin_logado'] = true;
        header("Location: painel_admin.php");
        exit();
    } else {
        $erro = "Tipo ou senha inválidos!";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Administrador</title>
    <style>
        body {
            background: linear-gradient(120deg, #7d1116, #c79c22);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-box {
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 25px rgba(0,0,0,0.2);
            width: 400px;
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
            color: #7d1116;
        }

        .login-box input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #c79c22;
            border-radius: 10px;
            font-size: 16px;
        }

        .login-box input:focus {
            outline: none;
            border-color: #7d1116;
        }

        .login-box button {
            background-color: #c79c22;
            color: white;
            border: none;
            padding: 12px;
            width: 80%;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-box button:hover {
            background-color: #7d1116;
        }

        .erro {
            margin-top: 10px;
            color: #7d1116;
            font-weight: bold;
        }
        .logo-container {
    position: center;
    top: 30px;
    display: flex;
    justify-content: center;
    width: 100%;
}
.voltar-btn {
    position: absolute;
    top: 30px;
    left: 30px;
    text-decoration: none;
}

.seta-img {
    width: 40px;
    height: auto;
    transition: transform 0.2s ease;
}

.seta-img:hover {
    transform: scale(1.1);
}
.logo {
    width: 120px;
    height: auto;
    filter: drop-shadow(2px 4px 6px rgba(0,0,0,0.3));
}

    </style>
</head>
<body>
<a href="layout.php" class="voltar-btn">
    <img src="voltar.png" alt="Voltar" class="seta-img">
</a>
<div class="login-box">
<div class="logo-container">
    <img src="logo.png" alt="Logo" class="logo">
</div>
    <h2>Login do Administrador</h2>
    <form method="POST">
        <input type="text" name="tipo" placeholder="Tipo de administrador" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
        <?php if (!empty($erro)): ?>
            <div class="erro"><?= $erro ?></div>
        <?php endif; ?>
    </form>
</div>

</body>
</html>
