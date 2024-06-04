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
    <link rel="stylesheet" href="Assets/CSS/accueil.css">
    <link rel="stylesheet" href="Assets/CSS/style.css">
    <link rel="stylesheet" href="Assets/CSS/produits.css">
    <link rel="stylesheet" href="Assets/CSS/produit.css">
    <title>Produits</title>
</head>
<body>
<?php include 'header.php'; ?>
  <main>
  <h1 class="Title1">Tous les produits</h1>
      <?php
      // Connexion à la base de données
      $mysqli = new mysqli("localhost", "root", "", "hyconics");
      
      // Vérification la connexion
      if ($mysqli->connect_error) {
          die("La connexion à la base de données a échoué : " . $mysqli->connect_error);
      }
      
      // Requête pour récupérer les produits
      $query = "SELECT * FROM produits";
      $result = $mysqli->query($query);
      
      ?>
     <main>
    
    <section class="product-grid">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="product">
                <div class="product-image">
                    <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['nom']; ?>">
                </div>
                <div class="product-info">
                    <h3><?php echo $row['nom']; ?></h3>
                    <p class="price">Prix : <?php echo $row['prix']; ?> Fr/CFA</p>
                    <p>Description du produit</p> <!-- Vous pouvez remplacer "Description du produit" par la description réelle du produit -->
                    <a href="produit.php?id=<?php echo $row['id']; ?>&nom=<?php echo urlencode($row['nom']); ?>&prix=<?php echo $row['prix']; ?>" class="btn-buy">Acheter</a>
                </div>
            </div>
        <?php } ?>
    </section>
</main>

      
      <?php
      // Fermer la connexion à la base de données
      $mysqli->close();
      ?>
      
  </main>

  <?php include 'footer.php'; ?>
  <script src="./Assets/javascript/script.js"></script> 
</body>
</html>
