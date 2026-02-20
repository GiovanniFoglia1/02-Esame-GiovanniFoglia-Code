
<?php
$valori = [
    'nomi' => '',
    'cognome' => '',
    'email' => '',
    'telefono' => '',
    'messaggio' => ''
];

$errori = [];

function erroreCampo($campo, $errori) {
    return isset($errori[$campo]) ? 'campo-errore' : '';
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $valori['nomi'] = trim($_POST['nomi'] ?? '');
    $valori['cognome'] = trim($_POST['cognome'] ?? '');
    $valori['email'] = trim($_POST['e-mail'] ?? '');
    $valori['telefono'] = trim($_POST['telefono'] ?? '');
    $valori['messaggio'] = trim($_POST['messaggio'] ?? '');

    if ($valori['nomi'] === '' || strlen($valori['nomi']) > 50) {
        $errori['nomi'] = 'Nome non valido';
    }

    if ($valori['cognome'] === '' || strlen($valori['cognome']) > 50) {
        $errori['cognome'] = 'Cognome non valido';
    }

    if (!filter_var($valori['email'], FILTER_VALIDATE_EMAIL)) {
        $errori['email'] = 'Email non valida';
    }

    if (!preg_match('/^[0-9]{10,15}$/', $valori['telefono'])) {
        $errori['telefono'] = 'Telefono non valido';
    }

    if ($valori['messaggio'] === '' || strlen($valori['messaggio']) > 500) {
        $errori['messaggio'] = 'Messaggio non valido';
    }

    if (empty($errori)) {
        $file = "contatti.txt";
        $str = "Nome: {$valori['nomi']}, Cognome: {$valori['cognome']}, Email: {$valori['email']}, Telefono: {$valori['telefono']}, Messaggio: {$valori['messaggio']}\n";
        file_put_contents($file, $str, FILE_APPEND | LOCK_EX);
        echo "<p class='success'>Modulo inviato correttamente</p>";
    }
}
?>

<?php 
$dati = json_decode(file_get_contents('esercizio.json'), true);
?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/file.min.css" type="text/css">
  <link rel="stylesheet" href="../css/form.min.css" type="text/css">
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
    <img src="./immagini/contattaci.jpg" alt="contattaci image"> 
    <span class="image-span"><?php echo $dati['titlepage']['titolo1']; ?></span>
  </div>

 <div class="background-form">
  
  <form action="form.php" method="POST" class="animation-form" novalidate>

  <div class="contact">
    <label for="name">Nome:</label>
    <input
      type="text"
      id="name"
      name="nomi"
      required
      value="<?= htmlspecialchars($valori['nomi'] ?? '') ?>"
      class="<?= isset($errori['nomi']) ? 'campo-errore' : '' ?>"
    >

    <label for="surname">Cognome:</label>
    <input
      type="text"
      id="surname"
      name="cognome"
      required
      value="<?= htmlspecialchars($valori['cognome'] ?? '') ?>"
      class="<?= isset($errori['cognome']) ? 'campo-errore' : '' ?>"
    >

    <label for="email">Email:</label>
    <input
      type="text"
      id="email"
      name="e-mail"
      required
      value="<?= htmlspecialchars($valori['email'] ?? '') ?>"
      class="<?= isset($errori['email']) ? 'campo-errore' : '' ?>"
    >

    <label for="phone">Telefono:</label>
    <input
      type="tel"
      id="phone"
      name="telefono"
      required
      value="<?= htmlspecialchars($valori['telefono'] ?? '') ?>"
      class="<?= isset($errori['telefono']) ? 'campo-errore' : '' ?>"
    >
  </div>

  <div class="message">
    <label for="message">Messaggio:</label>
    <textarea
      id="message"
      name="messaggio"
      required
      class="<?= isset($errori['messaggio']) ? 'campo-errore' : '' ?>"
    ><?= htmlspecialchars($valori['messaggio'] ?? '') ?></textarea>

    <button type="submit" class="green">Submit</button>
    <button type="reset" class="red">Reset</button>
  </div>

</form>



  <!--MAPPA CON INDIRIZZO -->
  <iframe 
    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3018.6864201120393!2d14.23735207603177!3d40.83485097137532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDDCsDUwJzA1LjUiTiAxNMKwMTQnMjMuNyJF!5e0!3m2!1sit!2sit!4v1758278005452!5m2!1sit!2sit" 
    width="400" 
    height="250" 
    style="border:5px solid #000; box-shadow:0 0 20px rgba(0,0,0,0.3);" 
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>

  <address class="addr-pin">
    Via Giuseppe Ferrigni 28, 80121, Napoli (NA)
  </address>

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
