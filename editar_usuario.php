<?php
include 'conexao.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    $sql = "UPDATE usuarios SET nome_usuario='$nome', cpf='$cpf', email='$email' WHERE id_usuario=$id";
    $conn->query($sql);
    header("Location: telaadm.php");  // Redireciona para a tela de administração após salvar
    exit;
}

$res = $conn->query("SELECT * FROM usuarios WHERE id_usuario = $id");
$usuario = $res->fetch_assoc();
?>

<h2>Editar Usuário</h2>
<form method="POST">
  Nome: <input type="text" name="nome" value="<?= $usuario['nome_usuario'] ?>"><br><br>
  CPF: <input type="text" name="cpf" value="<?= $usuario['cpf'] ?>"><br><br>
  Email: <input type="email" name="email" value="<?= $usuario['email'] ?>"><br><br>
  <input type="submit" value="Salvar">
</form>
