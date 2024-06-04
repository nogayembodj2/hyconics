
<!-- Vendeur  -->
<?php
// Vérification des données de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Vérification des données dans votre base de données (c'est un exemple simplifié)
    if ($username === "baba" && $password === "top") {
        // Les informations sont correctes, rediriger vers le tableau de bord du vendeur
        header("Location: C:\xampp\htdocs\hyconics\dashbord.php");
        exit();
    } else {
        // Les informations sont incorrectes, afficher un message d'erreur
        $error_message = "Nom d'utilisateur ou mot de passe incorrect";
        include("connexion.php");
    }
}
?>
