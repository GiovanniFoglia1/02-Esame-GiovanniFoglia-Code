<!DOCTYPE html>
<html lang="en">

<?php 
$dati = json_decode(file_get_contents('esercizio.json'), true);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/portfolio.min.css" type="text/css">
  <link rel="stylesheet" href="../css/file.min.css" type="text/css">
  <link rel="icon" href="./immagini/leafdesign.png" type="image/x-icon">
  <title>Leafdesign</title>


 

  
</head>

<body>
 <?php require_once 'layout.php';

renderHeader(
  $dati['menu'],
  'Home'
);
?>

  <div class="contattaci"> <!--IMMAGINE CON SPAN-->
    <span class="title-page"><?php echo $dati['titlepage']['titolo2']; ?></span>
    <img src="./immagini/tablet.jpg" class="home-image" alt="Tablet portfolio">
  </div>


  <div class="background-portfolio">
  <div class="content1">

    <?php foreach ($dati['paragrafi-card'] as $progetto): ?>
      <a href="progetto.php?id=<?php echo $progetto['id']; ?>">
        <div class="container-card">
          <div class="card">

            <div class="front">
              <img src="<?php echo $progetto['immagine']; ?>" alt="<?php echo $progetto['titolo']; ?>">
              <h3><?php echo $progetto['titolo']; ?></h3>
            </div>

            <div class="back">
              <p class="p-card"><?php echo $progetto['testo']; ?></p>
            </div>

          </div>
        </div>
      </a>
    <?php endforeach; ?>

  </div>
</div>
  

   <?php
renderFooter(
  $dati['info-footer'],
  $dati['social'],
  $dati['footer']['testo']
);
?>

</body>

</html>
