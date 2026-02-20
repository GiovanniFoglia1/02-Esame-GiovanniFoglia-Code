<!DOCTYPE html>
<html lang="en">

<?php 
$dati = json_decode(file_get_contents('esercizio.json'), true);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/progetto.min.css" type="text/css">
  <link rel="stylesheet" href="../css/file.min.css" type="text/css">
  <link rel="icon" href="./immagini/leafdesign.png" type="image/x-icon">
  
  <title>Leafdesign</title>
<?php require_once 'layout.php';

renderHeader(
  $dati['menu'],
  'Home'
);

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$progetto = null;

foreach ($dati['paragrafi-card'] as $item) {
  if ($item['id'] === $id) {
    $progetto = $item;
    break;
  }
}

if (!$progetto) {
  echo "Progetto non trovato";
  exit;
}
?>
?>

  <main> <!--DESCRIZIONE PROGETTO-->
    

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

  <?php
renderFooter(
  $dati['info-footer'],
  $dati['social'],
  $dati['footer']['testo']
);
?>
</body>

</html>
