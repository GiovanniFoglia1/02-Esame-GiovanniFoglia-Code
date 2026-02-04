<!DOCTYPE html>
<html lang="en">

<?php 
$dati = json_decode(file_get_contents('esercizio.json'), true);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/progetto.min.css" type="text/css">
  <link rel="stylesheet" href="./css/file.min.css" type="text/css">
  <link rel="icon" href="./immagini/leafdesign.png" type="image/x-icon">
  
  <title>Leafdesign</title>
</head>

<body>
 <header>
  <nav class="hamburger-menu">
    <!--HEADER-->
    <input type="checkbox" id="checkbox-label">
    <label for="checkbox-label" class="checkbox-controllo">
    <span class="span-hamburger"></span>
    </label>
    <img src="./immagini/leafdesign.png" class="logo" alt="Leaf Design logo">
    <ul id="menu">
   <?php foreach($dati['menu'] as $item): ?>
      <li><a href="<?php echo $item['link']; ?>" ><?php echo $item['nome']; ?></a></li>
      <?php endforeach; ?>
    </ul>
  </nav>
  </header>

  <main> <!--DESCRIZIONE PROGETTO-->
    <?php echo $dati['titlepage']['titolo2']; ?>

    <div class="container">
      <div class="image">
        <img src="./immagini/card.jpg" class="home-image" alt="Progetto immagine">
      </div>

      <div class="desc-work">
        <p class="desc">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis fuga dolorum ducimus, eum
          veritatis qui pariatur recusandae nulla dicta unde ratione! Consectetur, cupiditate tenetur! Dolores
          architecto dolore saepe autem nesciunt.
          <br><br>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis fuga dolorum ducimus, eum
          veritatis qui pariatur recusandae nulla dicta unde ratione! Consectetur, cupiditate tenetur! Dolores
          architecto dolore saepe autem nesciunt.
          
        </p>
      </div>
    </div>

  </main>

  <footer> <!--FOOTER-->
    <div class="footer-content">
      <img src="./immagini/leafdesign.png" class="logo-footer" alt="Leaf Design logo">

      <div class="info-section">
        <h3 class="title">Contatti</h3>
        <ul class="info">
          <?php foreach($dati['info-footer'] as $contatto): ?>
          <li><?php echo $contatto['nome']; ?>: <?php echo $contatto['valore']; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="social-section">
        <h3 class="title">Social</h3>
        <ul class="social">
          <?php foreach($dati['social'] as $social): ?>
          <li><a href="<?php echo $social['link']; ?>" target="_blank"><?php echo $social['nome']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <p>&copy; <?php echo $dati['footer']['testo']; ?></p>
  </footer>

</body>

</html>
