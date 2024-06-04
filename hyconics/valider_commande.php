<?php
session_start();

// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "hyconics");

// Vérifier si le panier existe et s'il n'est pas vide
if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
    // Récupérer les détails de la commande depuis le panier
    foreach ($_SESSION['panier'] as $id => $product) {
        $nom_produit = $product['nom'];
        $prix_produit = $product['prix'];
        // Insérer les détails de la commande dans la base de données ou effectuer toute autre action nécessaire
        // Exemple d'insertion dans la base de données
        $query = "INSERT INTO commandes (nom_produit, prix_produit) VALUES ('$nom_produit', '$prix_produit')";
        $mysqli->query($query);
    }
    
    // Vider le panier après avoir validé la commande
    unset($_SESSION['panier']);
    
    echo "La commande a été validée avec succès!";
} else {
    echo "Votre panier est vide. Veuillez ajouter des produits avant de valider la commande.";
}

// Rediriger l'utilisateur vers la page d'accueil ou une autre page après avoir validé la commande
// header("Location: index.php");
?>
