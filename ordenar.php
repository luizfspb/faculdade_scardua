<?php
$db = new SQLite3('db/data.db');
$ordem = $_GET['ordem'];

$sql = "SELECT * FROM manuais ORDER BY ";

switch ($ordem) {
  case 'data':
    $sql .= "data_upload DESC";
    break;
  case 'nome':
    $sql .= "assunto ASC";
    break;
  default:
    $sql .= "id DESC";
}

$result = $db->query($sql);

while ($row = $result->fetchArray()) {
  echo "<div class='manual'>";
  echo "<h3><a href='visualizar.php?id={$row['id']}'>{$row['assunto']}</a></h3>";
  echo "<p><a href='{$row['arquivo']}' target='_blank'>Baixar</a></p>";
  echo "<p>{$row['data_upload']}</p>";
  echo "</div>";
}
?>