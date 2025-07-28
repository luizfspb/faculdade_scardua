<?php
$db = new SQLite3('db/data.db');

// Receber dados do formulário
$assunto = $_POST['assunto'];
$departamento = $_POST['departamento'];
$descricao = $_POST['descricao'];

// Pasta de destino dos arquivos
$destino = 'uploads/';
if (!file_exists($destino)) {
  mkdir($destino, 0755);
}

// Processar o arquivo (se enviado)
$arquivo = $_FILES['arquivo']['name'];
$caminho = "";

if (!empty($arquivo)) {
  $caminho = $destino . basename($arquivo);
  move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho);
}

// Inserir dados no banco
$db->exec("INSERT INTO manuais (assunto, departamento, descricao, arquivo) 
           VALUES ('$assunto', '$departamento', '$descricao', '$caminho')");

// Redirecionar para a página principal
header("Location: index.php");
?>