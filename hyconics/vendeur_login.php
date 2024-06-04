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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Assets/CSS/accueil.css">
    <link rel="stylesheet" href="./Assets/CSS/style.css">
    <link rel="stylesheet" href="./Assets/CSS/vendeur_login.css">
    <title>Hyconics - Connexion</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="connexion-section">
        <div class="connexion-container">
            <div class="connexion-image">
                <img src="Assets/images/austin-distel-TluMvvrZ57g-unsplash.jpg" alt="Connexion">
            </div>
            <div class="connexion-form-container">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    // Vérification des données dans votre base de données (c'est un exemple simplifié)
                    if ($username === "baba" && $password === "top") {
                        // Les informations sont correctes, rediriger vers le tableau de bord du vendeur
                        header("Location: dashbord.php");
                        exit();
                    } else {
                        // Les informations sont incorrectes, afficher un message d'erreur
                        $error_message = "Nom d'utilisateur ou mot de passe incorrect";
                    }
                }
                ?>

                <h2 class="connexion-title">Connexion</h2>
                <?php if (isset($error_message)) { ?>
                    <p class="connexion-error"><?php echo $error_message; ?></p>
                <?php } ?>
                <form class="connexion-form" method="post">
                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" id="username" name="username" required><br>

                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password" required><br>

                    <button type="submit" class="connexion-button">Se connecter</button>
                </form>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>