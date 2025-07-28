<?php
$db = new SQLite3('db/data.db');
$result = $db->query("SELECT * FROM manuais ORDER BY data_upload DESC");

while ($row = $result->fetchArray()) {
  $data_envio = date('d/m/Y H:i', strtotime($row['data_upload']));
  $data_modificacao = !empty($row['data_modificado']) 
    ? date('d/m/Y H:i', strtotime($row['data_modificado']))
    : $data_envio;

  echo "<div class='manual'>";

    // Linha superior: título como link + ícone de edição
    echo "<div class='linha-topo'>";
      echo "<h3><a href='visualizar.php?id={$row['id']}'>" . htmlspecialchars(strip_tags($row['assunto'])) . "</a></h3>";
      echo "<a href='editar.php?id={$row['id']}' title='Editar manual'>";
      echo "<img src='assets/edit-icon.png' alt='Editar' class='icone-editar'>";
      echo "</a>";
    echo "</div>";

    // Departamento abaixo do título
    echo "<p><strong>Departamento:</strong> {$row['departamento']}</p>";

    // Descrição resumida
    echo "<p><strong>Breve descrição:</strong> " . substr(strip_tags($row['descricao']), 0, 50) . "...</p>";

    // Datas
    echo "<div class='linha-datas'>";
      echo "<span><strong>Enviado em:</strong> $data_envio</span>";
      echo "<span><strong>Modificado em:</strong> $data_modificacao</span>";
    echo "</div>";

  echo "</div>";
}
?>