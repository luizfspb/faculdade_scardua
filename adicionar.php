<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Manual - FACULDADE SCARDUA</title>
  <link rel="stylesheet" href="style.css">

  <!-- TinyMCE Editor -->
  <script src="https://cdn.tiny.cloud/1/yrjtfgyopajsskmw17mjwczrdenl7fh8o5alzolgyad2sv90/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#descricao',
      plugins: [
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media',
        'searchreplace', 'table', 'visualblocks', 'wordcount',
        'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed',
        'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable',
        'advcode', 'editimage', 'advtemplate', 'mentions', 'tinycomments', 'tableofcontents',
        'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
        'importword', 'exportword', 'exportpdf'
      ],
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | checklist numlist bullist indent outdent | emoticons charmap | removeformat | code',
      menubar: false,
      height: 350,
      tinycomments_mode: 'embedded',
      tinycomments_author: 'FACULDADE SCARDUA',
      mergetags_list: [
        { value: 'Setor', title: 'Departamento' },
        { value: 'Email', title: 'Email do Colaborador' }
      ]
    });
  </script>
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
    <h1>Adicionar Novo Manual</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      
      <!-- Linha lado a lado: Assunto + Departamento -->
      <div class="linha-dupla">
        <div class="campo">
          <label for="assunto">Assunto:</label>
          <input type="text" id="assunto" name="assunto" required>
        </div>

        <div class="campo">
          <label for="departamento">Departamento:</label>
          <select name="departamento" id="departamento" required>
            <option value="">--Selecione--</option>
            <option value="Administrativo">Administrativo</option>
            <option value="Caixa">Caixa</option>
            <option value="Comercial">Comercial</option>
            <option value="Financeiro">Financeiro</option>
            <option value="Logística">Logística</option>
            <option value="Marketing">Marketing</option>
            <option value="Oficina">Oficina</option>
            <option value="Pós-vendas">Pós-vendas</option>
            <option value="RH">RH</option>
            <option value="TI">TI</option>
          </select>
        </div>
      </div>

      <!-- Upload opcional -->
      <label for="arquivo">Upload de Arquivo (opcional):</label>
      <input type="file" id="arquivo" name="arquivo">

      <!-- Editor TinyMCE -->
      <label for="descricao">Descrição detalhada:</label>
      <textarea id="descricao" name="descricao"></textarea>

      <button type="submit">Salvar</button>
    </form>
  </main>
</body>
</html>