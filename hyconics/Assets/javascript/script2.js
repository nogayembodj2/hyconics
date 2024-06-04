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