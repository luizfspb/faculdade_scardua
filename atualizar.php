<?php
$db = new SQLite3('db/data.db');

$id = $_POST['id'];
$assunto = $_POST['assunto'];
$departamento = $_POST['departamento'];
$descricao = $_POST['descricao'];

// Salvar alterações
$db->exec("UPDATE manuais SET 
            assunto = '$assunto', 
            departamento = '$departamento', 
            descricao = '$descricao',
            data_modificado = CURRENT_TIMESTAMP
          WHERE id = $id");

header("Location: index.php");
?>