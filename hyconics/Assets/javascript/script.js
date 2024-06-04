
// produits;
// Ajouter un effet de survol pour les produits
const products = document.querySelectorAll(".product");

products.forEach((product) => {
  product.addEventListener("mouseover", () => {
    product.classList.add("hover");
  });

  product.addEventListener("mouseout", () => {
    product.classList.remove("hover");
  });
});

// achats produits
function showImage(thumbnailPath) {
    const mainImage = document.getElementById('main-image');
    mainImage.src = thumbnailPath;
  }
//   Défilement header
const header = document.querySelector('header');
const logo = document.getElementById('logo-nav');
const bag = document.querySelector('.panier')

window.addEventListener('scroll', () => {
  if (window.scrollY > 70) {
    header.classList.add('fixed-header');
    logo.classList.add('small-logo');
    bag.classList.add('smallbag');
} else {
    header.classList.remove('fixed-header');
    logo.classList.remove('small-logo');
    bag.classList.remove('smallbag');
  }
});

  // Header&Footer inclusion
  
// var headerRequest = new XMLHttpRequest();
//     headerRequest.onreadystatechange = function() {
//       if (this.readyState === 4 && this.status === 200) {
//         document.getElementById("header-container").innerHTML = this.responseText;
//       }
//     };
//     headerRequest.open("GET", "header.html", true);
//     headerRequest.send();

    // Charger le contenu du footer
    var footerRequest = new XMLHttpRequest();
    footerRequest.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        document.getElementById("footer-container").innerHTML = this.responseText;
      }
    };
    footerRequest.open("GET", "footer.php", true);
    footerRequest.send();

// Slider
const slider = document.querySelector(".slider");
let currentSlide = 0;

function showSlide() {
  const slideWidth = slider.clientWidth;
  const offset = currentSlide * slideWidth * -1;
  slider.style.transform = `translateX(${offset}px)`;
}

function changeSlide(n) {
  currentSlide = (currentSlide + n + 3) % 3;
  showSlide();
}

showSlide();
setInterval(() => changeSlide(1), 5000);





//pour valider la commande dans le panier
    function validerCommande() {
        // Soumettre le formulaire
        document.getElementById("commandeForm").submit();
    }










