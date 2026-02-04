<!DOCTYPE html>
<html lang="en">

<?php 
$dati = json_decode(file_get_contents('esercizio.json'), true);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/portfolio.min.css" type="text/css">
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

  <div class="contattaci"> <!--IMMAGINE CON SPAN-->
    <span class="title-page"><?php echo $dati['titlepage']['titolo3']; ?></span>
    <img src="./immagini/tablet.jpg" class="home-image" alt="Tablet portfolio">
  </div>


    
    <div class="background-portfolio">
    <div class="content1"> 
     <a href="./progetto.php">
      <div class="container-card">

        <div class="card">
          <div class="front">
            
            <img src="./immagini/card.jpg" alt="Progetto 1">
            <h3>Progetto 1</h3>
          </div>
          
          <div class="back">
            <p class="p-card"><?php echo $dati['paragrafi-card'][0]['testo']; ?></p>
            </div>
          
          
          
        </div>
      </div>
      </a>


      <a href="./progetto.php">
      <div class="container-card">
        <div class="card">
          <div class="front">
            <img src="./immagini/card.jpg" alt="Progetto 2">
            <h3>Progetto 2</h3>
          </div>
          <div class="back">
            <p class="p-card"><?php echo $dati['paragrafi-card'][1]['testo']; ?></p>
          </div>
        </div>
      </div>
      </a>
      

      <a href="./progetto.php">
      <div class="container-card">
        <div class="card">
          <div class="front">
            <img src="./immagini/card.jpg" alt="Progetto 3">
            <h3>Progetto 3</h3>
          </div>
          <div class="back">
            <p class="p-card"><?php echo $dati['paragrafi-card'][2]['testo']; ?></p>
          </div>
        </div>
      </div>
      </a>

    </div>

    <div class="content1">
      <a href="./progetto.php">
      <div class="container-card">
        <div class="card">
          <div class="front">
            <img src="./immagini/card.jpg" alt="Progetto 4">
            <h3>Progetto 4</h3>
          </div>
          <div class="back">
            <p class="p-card"><?php echo $dati['paragrafi-card'][3]['testo']; ?></p>
          </div>
        </div>
      </div>
      </a>
       


      <a href="./progetto.php">
      <div class="container-card">
        <div class="card">
          <div class="front">
            <img src="./immagini/card.jpg" alt="Progetto 5">
            <h3>Progetto 5</h3>
          </div>
          <div class="back">
            <p class="p-card"><?php echo $dati['paragrafi-card'][4]['testo']; ?></p>
          </div>
        </div>
      </div>
      </a>


      <a href="./progetto.php">
      <div class="container-card">
        <div class="card">
          <div class="front">
            <img src="./immagini/card.jpg" alt="Progetto 6">
            <h3>Progetto 6</h3>
          </div>
          <div class="back">
            <p class="p-card"><?php echo $dati['paragrafi-card'][5]['testo']; ?></p>
          </div>
        </div>
      </div>
      </a>

    </div>
   </div>

  

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
