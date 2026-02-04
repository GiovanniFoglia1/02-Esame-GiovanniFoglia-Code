
<?php
$dati = json_decode(file_get_contents('esercizio.json'), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $cognome = $_POST["cognome"];
  $email = $_POST["e-mail"];
  $telefono = $_POST["telefono"];
  $messaggio = $_POST["messaggio"];

  $errori = [];


if (empty($nome) || empty($cognome) || empty($email) || empty($telefono) || empty($messaggio)) {
    $errori[] = "<p>Riempire i campi mancanti.</p>";
    
  }

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errori[] = "<p>formato mail invalido.</p>";
    
  }

if (!preg_match("/^[0-9]{10,15}$/", $telefono)) {
    $errori[] = "<p>Numero di telefono invalido.</p>";
  }

if (strlen($messaggio) > 500) {
    $errori[] = "<p>Messaggio troppo lungo. Limite di 500 caratteri.</p>";
    
  }

if (strlen($nome) > 50 || strlen($cognome) > 50 || strlen ($nome . $cognome) < 3) {
    $errori[] = "<p>Nome e cognome non devono superare i 50 caratteri e devono essere almeno 3 caratteri complessivi.</p>";
    
  }

  


   if (!empty($errori)) {
        foreach ($errori as $errore) {
            echo "<p>$errore</p>";
        }
        exit;
    };
}

$file="contatti.txt";

  
    if (isset($nome) && isset($cognome) && isset($email) && isset($telefono) && isset($messaggio)){
       $str = "Nome: $nome, Cognome: $cognome, Email: $email, Telefono: $telefono, Messaggio: $messaggio\n";
       $rit = file_put_contents($file,$str, FILE_APPEND | LOCK_EX);

       if ($rit !== false) {
        echo "modulo salvato correttamente";
      }
    else {
        echo "errore scrittura del file";
    }

} else {
        echo "validazione fallita";
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/file.min.css" type="text/css">
  <link rel="stylesheet" href="./css/form.min.css" type="text/css">
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

    
     
    <img src="./immagini/leafdesign.png" class="logo" alt="leafdesign">
    <ul id="menu">
      <?php foreach($dati['menu'] as $item): ?>
      <li><a href="<?php echo $item['link']; ?>" ><?php echo $item['nome']; ?></a></li>
      <?php endforeach; ?>
    </ul>
  </nav>
  </header>

  <div class="contattaci"> <!--IMMAGINE CON SPAN-->
    <img src="./immagini/contattaci.jpg" alt="contattaci image"> 
    <span class="image-span"><?php echo $dati['titlepage']['titolo1']; ?></span>
  </div>

 <div class="background-form">
  
  <form action="form.php" method="POST" class="animation-form"> <!--FORM-->
    <div class="contact">
      <label for="name">Nome:</label>
      <input type="text" id="name" name="nome"  required>

      <label for="surname">Cognome:</label>
      <input type="text" id="surname" name="cognome"  required>

      <label for="email">Email:</label>
      <input type="text" id="email" name="e-mail" required>

      <label for="phone">Telefono:</label>
      <input type="tel" id="phone" name="telefono" required>
    </div>
    
    <div class="message">
      <label for="message">Messaggio:</label>
      <textarea id="message" name="messaggio" required ></textarea>

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
    
  <footer> <!--FOOTER-->
    <div class="footer-content">
      <img src="./immagini/leafdesign.png" class="logo-footer" alt="leafdesign">

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
