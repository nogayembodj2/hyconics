<?php
session_start();

// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "hyconics");

// Vérifiez si le formulaire a été soumis
if (isset($_POST['ajouter_au_panier'], $_POST['id'], $_POST['nom'], $_POST['prix'])) {
    $product_id = $_POST['id'];
    $product_nom = $_POST['nom'];
    $product_prix = $_POST['prix'];

    // Vérifiez si le produit existe déjà dans le panier
    if (isset($_SESSION['panier'][$product_id])) {
        // Augmenter la quantité du produit
        $_SESSION['panier'][$product_id]['quantity']++;
    } else {
        // Ajouter le produit au panier
        $_SESSION['panier'][$product_id] = array(
            'id' => $product_id,
            'nom' => $product_nom,
            'prix' => $product_prix,
            'quantity' => 1
        );
    }

    // Rediriger l'utilisateur vers la page du produit ou une autre page
    header('Location: produit.php?id=' . $product_id . '&nom=' . $product_nom . '&prix=' . $product_prix);
    exit();
}

// Affichage du contenu après le traitement du formulaire
echo "<p>Merci pour votre message. Nous vous répondrons bientôt.</p>";
?>
