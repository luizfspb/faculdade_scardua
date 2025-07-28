<?php
$db = new SQLite3('db/data.db');

$q = $_GET['q'] ?? '';
$q = trim($q);

if ($q !== '') {
  $stmt = $db->prepare("SELECT * FROM manuais WHERE assunto LIKE :q OR descricao LIKE :q");
  $stmt->bindValue(':q', '%' . $q . '%');
  $result = $stmt->execute();

  while ($row = $result->fetchArray()) {
    echo "<div class='manual'>";
    echo "{$row['id']}'>{$row['assunto']}";
    echo "Departamento:{$row['departamento']}";
    echo "Breve descrição:" . substr(strip_tags($row['descricao']), 0, 120) . "...";
    echo "</div>";
  }
}
?>