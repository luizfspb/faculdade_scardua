<?php
$db = new SQLite3('db/data.db');
$id = $_GET['id'];

// Buscar os dados atuais do manual
$result = $db->query("SELECT * FROM manuais WHERE id = $id");
$row = $result->fetchArray();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Manual - FACULDADE SCARDUA</title>
  <link rel="stylesheet" href="style.css">

  <!-- TinyMCE para edição rica -->
  <script src="https://cdn.tiny.cloud/1/yrjtfgyopajsskmw17mjwczrdenl7fh8o5alzolgyad2sv90/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#descricao',
      plugins: 'image link lists code table autoresize',
      toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
      height: 350
    });
  </script>
</head>
<body>
  <header>
    <img src="assets/logo.png" alt="Logo Faculdade Scardua" class="logo">
    <nav>
      <ul>
        <li><a href="index.php">Início</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h1>Editar Manual</h1>
    <form action="atualizar.php" method="POST">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">

      <div class="linha-dupla">
        <div class="campo">
          <label for="assunto">Assunto:</label>
          <input type="text" id="assunto" name="assunto" value="<?= $row['assunto'] ?>" required>
        </div>

        <div class="campo">
          <label for="departamento">Departamento:</label>
          <select name="departamento" id="departamento" required>
            <option value="">--Selecione--</option>
            <?php
              $setores = ["Administrativo", "Caixa", "Comercial", "Financeiro", "Logística", "Marketing", "Oficina", "Pós-vendas", "RH", "TI"];
              foreach ($setores as $s) {
                $selected = ($row['departamento'] == $s) ? "selected" : "";
                echo "<option value='$s' $selected>$s</option>";
              }
            ?>
          </select>
        </div>
      </div>

      <label for="descricao">Descrição detalhada:</label>
      <textarea id="descricao" name="descricao"><?= htmlspecialchars($row['descricao']) ?></textarea>

      <button type="submit">💾 Salvar Alterações</button>
    </form>
  </main>
</body>
</html>