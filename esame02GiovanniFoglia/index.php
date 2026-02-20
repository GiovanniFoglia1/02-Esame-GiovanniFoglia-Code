<!DOCTYPE html>
<html lang="it">

<head>

<?php 
$dati = json_decode(file_get_contents('esercizio.json'), true);
?>
  <meta charset="UTF-8">
  <title>Leafdesign</title>
  <link rel="stylesheet" href="../css/file.min.css" type="text/css">
  <link rel="stylesheet" href="../css/chisiamo.min.css" type="text/css">
  <link rel="icon" href="./leafdesign.png" type="image/x-icon">

  
</head>

<body>
<header>
 <?php require_once 'layout.php';

renderHeader(
  $dati['menu'],
  'Home'
);
?>

  <main> <!--SLIDER IMMAGINI-->
   

    <div class="content"> <!--PRESENTAZIONE-->
         <div class="position-slider">
    <div class="slider">
      <span id="slider1"></span>
      <span id="slider2"></span>
      <span id="slider3"></span>
      <div class="image-carousel">
        <img src="./immagini/image1.png" alt="Immagine 1" class="slider-image">
        <img src="./immagini/image2.webp" alt="Immagine 2" class="slider-image">
        <img src="./immagini/image3.jpg" alt="Immagine 3" class="slider-image">
      </div>
      <div class="button-slider">
        <a href="#slider1" class="manual-btn"></a>
        <a href="#slider2" class="manual-btn"></a>
        <a href="#slider3" class="manual-btn"></a>
      </div>
    </div>
    </div>
      <h2 class="title-chisiamo"><?php echo $dati['chisiamo']['titolo']; ?></h2>
      <p class="chi-siamo">
        <?php echo $dati['chisiamo']['testo']; ?>
      </p>

      <h2><?php echo $dati['chisiamo']['titolo2']; ?></h2>
      <ul class="servizi">
        <?php foreach($dati['servizi'] as $servizio): ?>
        <li><?php echo $servizio['nome']; ?></li>
        <?php endforeach; ?>
      </ul>

      
      <div class="testimonials-container style1">
        <h2><?php echo $dati['chisiamo']['titolo3']; ?></h2>
        <div class="testimonials">
       <?php foreach($dati['testimonianze'] as $testimonianza): ?>
          <blockquote>
            "<?php echo $testimonianza['testo']; ?>"
            <br>– <?php echo $testimonianza['autore']; ?>, <?php echo $testimonianza['ruolo']; ?>
             </blockquote>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    </div>

  </main>

  <?php
renderFooter(
  $dati['info-footer'],
  $dati['social'],
  $dati['footer']['testo']
);
?>
</body>
</html>
