<?php
$db = new SQLite3('db/data.db');

// Verifica se a coluna "departamento" já existe
$check = $db->query("PRAGMA table_info(manuais)");
$existe = false;

while ($coluna = $check->fetchArray()) {
  if ($coluna['name'] === 'departamento') {
    $existe = true;
    break;
  }
}

if (!$existe) {
  $db->exec("ALTER TABLE manuais ADD COLUMN departamento TEXT");
  echo "Campo 'departamento' adicionado com sucesso!";
} else {
  echo "A coluna 'departamento' já existe.";
}
?>