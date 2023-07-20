<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maquette Pays</title>
  <!-- CSS de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="./img/logo.svg" width="200" height="200" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Recherche</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h1>Ma super page de recherche</h1>
  </div>

  <div class="formulaire">   
    <form action="index.php" method="GET">
        <input type="text" name="lang" placeholder="Choix de la langue">
        <input type="submit" value="Rechercher">
    </form>
  </div>

<?php
// requete API

  //formulaire
  $langRecherche = "french";
  if (isset($_GET['lang'])) {
    $langRecherche = $_GET['lang'];
    echo "<h2>Résultats de la recherche pour : '$langRecherche'</h2>";
  }

  $ch = curl_init('https://restcountries.com/v3.1/lang/{langRecherche}');
  curl_setopt($ch, CURLOPT_CAINFO, __DIR__ . DIRECTORY_SEPARATOR . 'certificat.crt');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = curl_exec($ch);

  if (curl_errno($ch)) {
      echo 'Erreur cURL : ' . curl_error($ch);
  }else{
    $data = json_decode($data, true);
    foreach($data as $d){
      var_dump($d);
    }
  }
  curl_close($ch);

  

?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
