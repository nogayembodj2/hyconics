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
    <link rel="stylesheet" href="./Assets/CSS/services.css">
    <title>Hyconics</title>
</head>
<body>
<?php include 'header.php'; ?>

    <main class="services-page">
      <h1 class="Title1">Nos Services</h1>
      <section class="services">
        <div class="service" style="background-image: url('Assets/images/pexels-kindel-media-6994275.jpg');">
          <div class="service-details">
            <i class="fas fa-shipping-fast"></i>
            <h2>Livraison Partout dans le Monde</h2>
            <p>Nous assurons la livraison rapide et sécurisée de vos commandes vers n'importe quelle destination dans le monde entier. Peu importe où vous êtes, vous pouvez obtenir vos sneakers préférées sans tracas.</p>
          </div>
        </div>
  
        <div class="service" style="background-image: url('Assets/images/raoul-ortega-2JtF6pYAOOI-unsplash.jpg');">
          <div class="service-details">
            <i class="fas fa-gift"></i>
            <h2>Service de Personnalisation</h2>
            <p>Nous offrons un service de personnalisation unique pour vos sneakers. Vous pouvez choisir vos couleurs, motifs et détails préférés pour créer des sneakers qui reflètent votre style personnel.</p>
          </div>
        </div>
  
        <div class="service" style="background-image: url('Assets/images/james-woods-1X4R96Zu0SU-unsplash.jpg');">
          <div class="service-details">
            <i class="fas fa-hammer"></i>
            <h2>Réparation et Entretien</h2>
            <p>Nos experts sont là pour réparer et entretenir vos sneakers préférées. Que ce soit pour des réparations mineures ou un entretien complet, nous veillons à ce que vos sneakers restent en parfait état.</p>
          </div>
        </div>
      </section>
    </main>

    <?php include 'footer.php'; ?>
<script src="Assets/javascript/script.js"></script> 
</body>
</html>
