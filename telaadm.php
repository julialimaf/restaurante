<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel Admin</title>
  <style>
    button {
      padding: 10px 15px;
      margin: 5px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .section {
      display: none;
      margin-top: 20px;
    }

    .section.active {
      display: block;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
    }

    a.button {
      padding: 5px 10px;
      background: #007BFF;
      color: white;
      text-decoration: none;
      border-radius: 4px;
    }

    a.button.delete {
      background: #dc3545;
    }
  </style>
</head>
<body>

<h1>Painel do Administrador</h1>

<!-- Botões -->
<div>
  <button onclick="mostrar('info')">Ver Informações</button>
  <button onclick="mostrar('usuarios')">Ver Usuários</button>
  <button onclick="mostrar('reservas')">Ver Reservas</button>
</div>

<!-- Seções -->
<div id="info" class="section active">
  <h2>Informações Gerais</h2>
  <p>Bem-vindo ao sistema de gerenciamento. Use os botões acima para navegar entre os dados.</p>
</div>

<div id="usuarios" class="section">
  <h2>Usuários</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CPF</th>
      <th>Email</th>
      <th>Ações</th>
    </tr>
    <?php
      $res = $conn->query("SELECT * FROM usuarios");
      while ($u = $res->fetch_assoc()):
    ?>
    <tr>
      <td><?= $u['id_usuario'] ?></td>
      <td><?= $u['nome_usuario'] ?></td>
      <td><?= $u['cpf'] ?></td>
      <td><?= $u['email'] ?></td>
      <td>
        <a href="editar_usuario.php?id=<?= $u['id_usuario'] ?>" class="button">Editar</a>
        <a href="excluir_usuario.php?id=<?= $u['id_usuario'] ?>" class="button delete" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>

<div id="reservas" class="section">
  <h2>Reservas</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Nº Mesa</th>
      <th>Usuário</th>
      <th>Ações</th>
    </tr>
    <?php
      $res = $conn->query("SELECT r.id_reserva, r.num_mesa, u.nome_usuario, r.data_hora
                           FROM reservas r 
                           JOIN usuarios u ON r.id_usuario_fk = u.id_usuario");
      while ($r = $res->fetch_assoc()):
    ?>
    <tr>
      <td><?= $r['id_reserva'] ?></td>
      <td><?= $r['num_mesa'] ?></td>
      <td><?= $r['nome_usuario'] ?></td>
      <td><?= $r['data_hora'] ?></td>
      <td>
        <a href="editar_reserva.php?id=<?= $r['id_reserva'] ?>" class="button">Editar</a>
        <a href="excluir_reserva.php?id=<?= $r['id_reserva'] ?>" class="button delete" onclick="return confirm('Tem certeza que deseja excluir esta reserva?')">Excluir</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>

<!-- Script simples -->
<script>
  function mostrar(id) {
    const secoes = document.querySelectorAll('.section');
    secoes.forEach(secao => {
      secao.classList.remove('active');
    });

    document.getElementById(id).classList.add('active');
  }
</script>

</body>
</html>
