<?php
session_start();

// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "hyconics");

if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
    $idToRemove = $_GET['id'];

    if (isset($_SESSION['panier'][$idToRemove])) {
        unset($_SESSION['panier'][$idToRemove]);
    }
}

// Fonction pour calculer le total du panier
function calculateTotal() {
    $total = 0;
    if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
        foreach ($_SESSION['panier'] as $product) {
            $total += $product['prix'];
        }
    }
    return $total;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Assets/CSS/accueil.css">
    <link rel="stylesheet" href="./Assets/CSS/style.css">
    <title>Hyconics</title>
</head>
<body>
<?php include 'header.php'; ?>

<section class="presentation">
<div class="slider-container">
    <div class="slider">
      <div class="slide">
        <img src="Assets/images/domino-164_6wVEHfI-unsplash.jpg" alt="Image 1">
        <div class="slide-text">
          <h2>Nike "free"</h2>
          <p>Découvrez le best-seller de la semaine</p>
          <a href="nouveaute.php">Découvrir</a>
        </div>
      </div>
  
      <div class="slide">
        <img src="Assets/images/pexels-melvin-buezo-2529148.jpg" alt="Image 2">
        <div class="slide-text">
          <h2>Nike "Air Max"</h2>
          <p>Le coup de coeur de nos abonnés</p>
          <a href="nouveaute.php">Acheter</a>
        </div>
      </div>
  
      <div class="slide">
        <img src="Assets/images/pexels-rafa-de-345415.jpg" alt="Image 3">
        <div class="slide-text">
          <h2>Rejoignez-nous</h2>
          <p>Contactez-nous et rejoignez nous sur nos réseaux</p>
          <a href="services.php">Nous rejoindre</a>
        </div>
      </div>
    </div>
  </div>
</section>

<h1 class="Title1" style="text-align-last: center;">Nos Services</h1>
<section class="services">
  <div class="service">
    <div class="service-icon">
      <i class="fa-solid fa-earth-americas"></i>
    </div>
    <div class="service-content">
      <h2>Livraison Rapide dans le Monde Entier</h2>
      <p>Nous assurons une livraison rapide et fiable de vos sneakers dans le monde entier. Peu importe où vous êtes, vos chaussures arriveront à temps !</p>
      <a href="services.php" class="btn-custom">En savoir plus</a>
    </div>
  </div>

  <div class="service">
    <div class="service-icon">
      <i class="fa-solid fa-phone"></i>
    </div>
    <div class="service-content">
      <h2>Support Client 24/7</h2>
      <p>Notre équipe de support client est disponible 24 heures sur 24, 7 jours sur 7 pour répondre à toutes vos questions et vous aider dans vos achats.</p>
      <a href="services.php" class="btn-custom">En savoir plus</a>
    </div>
  </div>

  <div class="service">
    <div class="service-icon">
      <i class="fa-solid fa-check"></i>
    </div>
    <div class="service-content">
      <h2>Qualité Supérieure Garantie</h2>
      <p>Nos sneakers sont fabriquées avec des matériaux de haute qualité pour vous assurer un confort optimal et une durabilité exceptionnelle.</p>
      <a href="services.php" class="btn-custom">En savoir plus</a>
    </div>
  </div>
  <div class="service">
    <div class="service-icon">
      <i class="fa-solid fa-money-bill-1-wave" alt="Icône Qualité"></i>
    </div>
    <div class="service-content">
      <h2>Paiement sécurisé</h2>
      <p>Nous collaborons avec les meilleures banques pour sécuriser tous vos paiements effectués en ligne.</p>
      <a href="services.php" class="btn-custom">En savoir plus</a>
    </div>
  </div>
</section>

<!-- ... Le reste de votre code HTML ... -->

<section class="featured-products">
  <h2>Nos Produits en Vedette</h2>

  <?php
  // Établir la connexion à la base de données
  $mysqli = new mysqli("localhost", "root", "", "hyconics");

  // Vérifier la connexion
  if ($mysqli->connect_error) {
      die("Erreur de connexion : " . $mysqli->connect_error);
  }

  // Requête SQL pour récupérer les produits
  $query = "SELECT * FROM produits LIMIT 2"; // Récupère les deux premiers produits par exemple
  $result = $mysqli->query($query);

  // Parcourir les résultats et afficher les produits
  while ($row = $result->fetch_assoc()) {
  ?>
    <div class="product">
      <div class="product-image">
        <!-- Lien vers la page de présentation du produit avec les paramètres nécessaires -->
        <a href="produit.php?id=<?php echo $row['id']; ?>&nom=<?php echo $row['nom']; ?>&prix=<?php echo $row['prix']; ?>">
          <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['nom']; ?>">
          <div class="product-overlay">
            <h3><?php echo $row['nom']; ?></h3>
            <p><?php echo $row['description']; ?></p>
            <!-- Lien vers la page de présentation du produit avec les paramètres nécessaires -->
            <a href="produit.php?id=<?php echo $row['id']; ?>&nom=<?php echo $row['nom']; ?>&prix=<?php echo $row['prix']; ?>" class="btn-custom">Acheter</a>
          </div>
        </a>
      </div>
    </div>
  <?php
  }

  // Fermer la connexion à la base de données
  $mysqli->close();
  ?>

</section>

<script src="Assets/javascript/script.js"></script> 
<?php include 'footer.php'; ?>
</body>
</html>
