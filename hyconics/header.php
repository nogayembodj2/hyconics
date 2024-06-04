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

<header>
    <div class="infos">
      <p><i class="fa-solid fa-truck"></i>Livraison gratuite à partir de 70 000Fr/cfa</p>
      <p><i class="fa-solid fa-arrows-rotate"></i>Retour et remboursement possible dans les 10 jours qui suivent l'achat</p>
    </div>
    <div class="header-container">
<a href="Accueil.php"><img src="Assets/images/Hyconics.png" alt="Logo" id="logo-nav" class="petit-logo"></a>
<nav>
  <ul>
    <li class="bouton-blanc"><a href="Accueil.php">Accueil</a></li>
    <li class="bouton-blanc dropdown"><a href="index.php">Produits</a>
        <div class="dropdown-content">
          <a href="nouveaute.php">Nouveautés</a>
          <a href="index.php">Tous les produits</a>
        </div>
      </li></li>
    <li class="promo"><a href="promo.php">Promo</a></li>
    <li class="bouton-blanc"><a href="services.php">Services</a></li>
    <li class="bouton-blanc"><a href="contact.php">Contact</a></li>
    <div class="cart-icon">
    <a href="panier.php">
        <i class="fas fa-shopping-cart panier"></i>
        <?php
        $cartItemCount = isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0;
        if ($cartItemCount > 0) {
            echo '<span class="cart-item-count">' . $cartItemCount . '</span>';
        }
        ?>
    </a>
</div>
  </ul>
</nav>
</div>
</header>


<script src="Assets/javascript/script.js"></script>
</body>
</html>