<?php
include 'conexao.php';

$id = $_GET['id'];
$conn->query("DELETE FROM reservas WHERE id_reserva = $id");
header("Location: telaadm.php");  // Redireciona para a tela de administração
exit;
?>
