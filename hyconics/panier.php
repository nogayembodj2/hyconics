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
    <link rel="stylesheet" href="Assets/CSS/panier.css"> <!-- Lien vers le fichier CSS du panier -->
    <title>Panier</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="main-content">
        <section class="cart-section">
            <h1>Votre Panier</h1>
            <!-- Début du formulaire -->
            <form id="commandeForm" action="valider_commande.php" method="post">
                <div class="cart-items">
                    <?php
                    if (!isset($_SESSION['panier']) || count($_SESSION['panier']) === 0) {
                        echo "<p class='empty-cart-message'>Votre panier est vide.</p>";
                    } else {
                        echo '<div class="cart-titles">';
                        echo '<p class="product-title">Produit</p>';
                        echo '<p class="action-title">Action</p>';
                        echo '</div>';
                        foreach ($_SESSION['panier'] as $id => $product) {
                            echo '<div class="cart-product">';
                            echo '<div class="product-details">';
                            echo '<p class="product-name">' . $product['nom'] . '</p>';
                            echo '<p class="product-price">' . $product['prix'] . ' Fr/CFA</p>';
                            echo '</div>';
                            echo '<a href="panier.php?action=remove&id=' . $id . '" class="btn-remove">Supprimer</a>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <div class="totalvalidate">
                    <p id="total-price" class="total-price">Total du panier: <span id="total-amount"><?php echo calculateTotal(); ?></span> Fr/CFA</p>
                    <button id="btn-validate" class="btn-validate" onclick="validerCommande()">Valider commande</button>
                </div>
            </form>
            <!-- Fin du formulaire -->
        </section>
    </main>

    <?php include 'footer.php'; ?>
    <script src="Assets/javascript/script.js"></script>
</body>
</html>
