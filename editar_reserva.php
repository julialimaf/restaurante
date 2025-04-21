<?php
include 'conexao.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num_mesa = $_POST['num_mesa'];
    $id_usuario = $_POST['id_usuario'];

    $conn->query("UPDATE reservas SET num_mesa='$num_mesa', id_usuario_fk='$id_usuario' WHERE id_reserva=$id");
    header("Location: telaadm.php");  // Redireciona para a tela de administração após salvar
    exit;
}

$res = $conn->query("SELECT * FROM reservas WHERE id_reserva = $id");
$reserva = $res->fetch_assoc();

$usuarios = $conn->query("SELECT id_usuario, nome_usuario FROM usuarios");
?>

<h2>Editar Reserva</h2>
<form method="POST">
  Número da Mesa: <input type="number" name="num_mesa" value="<?= $reserva['num_mesa'] ?>"><br><br>
  Usuário:
  <select name="id_usuario">
    <?php while ($u = $usuarios->fetch_assoc()): ?>
      <option value="<?= $u['id_usuario'] ?>" <?= $u['id_usuario'] == $reserva['id_usuario_fk'] ? 'selected' : '' ?>>
        <?= $u['nome_usuario'] ?>
      </option>
    <?php endwhile; ?>
  </select><br><br>
  <input type="submit" value="Salvar">
</form>
