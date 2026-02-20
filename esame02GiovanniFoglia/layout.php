<?php

function renderHeader(
  array $menu,
  string $pageTitle = 'Leaf Design',
  string $logoPath = './immagini/leafdesign.png'
) {
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<header>
  <nav class="hamburger-menu">
    <input type="checkbox" id="checkbox-label">
    <label for="checkbox-label" class="checkbox-controllo">
      <span class="span-hamburger"></span>
    </label>

    <img src="<?= htmlspecialchars($logoPath) ?>" class="logo" alt="Leaf Design logo">

    <ul id="menu">
      <?php foreach ($menu as $item): ?>
        <li>
          <a href="<?= htmlspecialchars($item['link']) ?>"
             title="<?= htmlspecialchars($item['nome']) ?>">
            <?= htmlspecialchars($item['nome']) ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>
</header>
<?php
}


function renderFooter(
  array $infoFooter,
  array $social,
  string $footerText,
  string $logoPath = './immagini/leafdesign.png'
) {
?>
<footer class="site-footer">
  <div class="footer-content">

    <img src="<?= htmlspecialchars($logoPath) ?>" class="logo-footer" alt="Leaf Design logo">

    <div class="info-section">
      <h3 class="title">Contatti</h3>
      <ul class="info">
        <?php foreach ($infoFooter as $contatto): ?>
          <li>
            <?= htmlspecialchars($contatto['nome']) ?>:
            <?= htmlspecialchars($contatto['valore']) ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="social-section">
      <h3 class="title">Social</h3>
      <ul class="social">
        <?php foreach ($social as $item): ?>
          <li>
            <a href="<?= htmlspecialchars($item['link']) ?>" target="_blank" rel="noopener">
              <?= htmlspecialchars($item['nome']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

  </div>

  <p class="copyright">
    &copy; <?= htmlspecialchars($footerText) ?>
  </p>
</footer>

</body>
</html>
<?php
}