<?php
$db = new SQLite3('db/data.db');
$assunto = $_GET['assunto'];

$sql = "SELECT * FROM manuais WHERE assunto LIKE '%$assunto%' ORDER BY data_upload DESC";
$result = $db->query($sql);

while ($row = $result->fetchArray()) {
  echo "<div class='manual'>";
  echo "<h3>{$row['assunto']}</h3>";
  echo "<p><a href='{$row['arquivo']}' target='_blank'>Baixar</a></p>";
  echo "<p>{$row['data_upload']}</p>";
  echo "</div>";
}
?>