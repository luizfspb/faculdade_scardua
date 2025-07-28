<?php
$db = new SQLite3('db/data.db');
$id = $_GET['id'];

$result = $db->query("SELECT * FROM manuais WHERE id = $id");
$row = $result->fetchArray();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Visualizar Manual - FACULDADE SCARDUA</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <img src="assets/logo.png" alt="Logo Faculdade Scardua" class="logo">
    <nav>
      <ul>
        <li><a href="index.php">Início</a></li>
        <li><a href="adicionar.php">Adicionar Manual</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="manual-detalhe">
      <h2><?= $row['assunto'] ?></h2>
      <p><strong>Departamento:</strong> <?= $row['departamento'] ?></p>
      <p><strong>Descrição:</strong></p>
      <p><?= nl2br($row['descricao']) ?></p>
      <p><strong>Enviado em:</strong> <?= $row['data_upload'] ?></p>
      <p><a href="<?= $row['arquivo'] ?>" target="_blank" class="btn">📎 Baixar Arquivo</a></p>
      <a href="editar.php?id=<?= $row['id'] ?>" class="btn-editar">✏️ Editar Manual</a></p>
      <a href="index.php" class="btn-voltar">⬅ Voltar para os manuais</a>
    </div>
  </main>
</body>
</html>