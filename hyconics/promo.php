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
      <link rel="stylesheet" href="./Assets/CSS/promo.css">
      <title>Hyconics</title>
  </head>
  <body>
  <?php include 'header.php'; ?>

  <?php
$mysqli = new mysqli("localhost", "root", "", "hyconics");

if ($mysqli->connect_error) {
    die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
}

$query = "SELECT * FROM produits LIMIT 2"; // Remplacez "promotions" par le nom de votre table

$result = $mysqli->query($query);

if (!$result) {
    die("Erreur lors de l'exécution de la requête : " . $mysqli->error);
}
?>

<main class="promo-page">
  <h1 class="Title1">Nos Promotions</h1>
  <section class="promo-products">
    <?php while ($row = $result->fetch_assoc()) { ?>
      <div class="promo-product">
        <div class="promo-image">
          <img src="<?php echo $row['image_path']; ?>" alt="Promo Sneaker">
        </div>
        <div class="promo-info">
          <h2><?php echo $row['nom']; ?></h2>
          <p class="promo-price">
            <span class="original-price">Prix : <?php echo $row['prix']; ?> Fr/CFA</span>
            <span class="discounted-price"><?php echo $row['prix']; ?> Fr/CFA</span>
          </p>
          <a href="produit.php?id=<?php echo $row['id']; ?>&nom=<?php echo $row['nom']; ?>&prix=<?php echo $row['prix']; ?>" class="btn-custom">Acheter</a>
        </div>
      </div>
    <?php } ?>

  </section>
</main>

<?php
$mysqli->close();
?>

  
  <?php include 'footer.php'; ?>

  <script src="Assets/javascript/script.js"></script> 
  </body>
  </html>
  