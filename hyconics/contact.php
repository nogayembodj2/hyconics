<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Assets/CSS/accueil.css">
    <link rel="stylesheet" href="./Assets/CSS/style.css">
    <link rel="stylesheet" href="./Assets/CSS/contact.css">
    <title>Hyconics</title>
</head>
<body>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="style.css"> <!-- Assurez-vous d'ajuster le chemin vers votre fichier CSS -->
    <!-- Inclure d'autres balises <link> ou <script> si nécessaire -->
</head>
<body>
    <main class="contact-page">
        <h1 class="Title1">Contactez-nous</h1>
        <div class="contact-container">
            <div class="image-container">
                <img src="Assets/images/pexels-hassan-ouajbir-1306248.jpg" alt="Contactez-nous">
            </div>
            <div class="form-container">
                <form method="post" action="traitement.php"> <!-- Vous devrez créer un fichier traitement.php pour traiter le formulaire -->
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message :</label>
                        <textarea id="message" name="message" rows="4" required></textarea>
                    </div>
                    <div class="button-container">
                        <button type="submit">Envoyer</button>
                    </div>
                </form>
                <p>Rejoignez-nous pour ne rien rater</p>
                <div class="social-links">
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>


    <!-- <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];


    echo "<p>Merci pour votre message. Nous vous répondrons bientôt.</p>";
}
?> -->
<?php include 'footer.php'; ?>
<script src="Assets/javascript/script.js"></script> 
  </body>

</html>