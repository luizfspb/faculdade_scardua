<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>FACULDADE SCARDUA</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <nav class="nav-bar">
      <img src="assets/logo.png" alt="Logo Faculdade Scardua" class="logo">
      <ul>
        <li><a href="index.php">Início</a></li>
      </ul>
      <div class="menu-search">
        <input type="text" id="searchInput" placeholder="Buscar manuais...">
      </div>
    </nav>
  </header>

  <main>
    <h1>Últimos Manuais</h1>

    <div class="search-result-count" id="contador"></div>
    <div id="resultados"></div>
    <div id="manuais-padrao">
      <?php include 'listar.php'; ?>
    </div>

    <a href="adicionar.php" class="btn">➕ Adicionar Manual</a>
  </main>

  <script>
    const input = document.getElementById('searchInput');
    const resultados = document.getElementById('resultados');
    const manuaisPadrao = document.getElementById('manuais-padrao');
    const contador = document.getElementById('contador');

    input.addEventListener('input', () => {
      const termo = input.value.trim();

      if (termo === '') {
        resultados.innerHTML = '';
        contador.innerText = '';
        manuaisPadrao.style.display = 'block';
        return;
      }

      fetch(`buscar.php?q=${encodeURIComponent(termo)}`)
        .then(res => res.text())
        .then(html => {
          resultados.innerHTML = html;
          manuaisPadrao.style.display = 'none';

          const manuais = resultados.querySelectorAll('.manual');
          contador.innerText = `${manuais.length} resultado(s) encontrado(s)`;

          // Destacar o termo buscado
          resultados.querySelectorAll('.manual').forEach(manual => {
            manual.innerHTML = manual.innerHTML.replace(
              new RegExp(termo, 'gi'),
              match => `<span class="highlight">${match}</span>`
            );
          });
        });
    });
  </script>
</body>
</html>