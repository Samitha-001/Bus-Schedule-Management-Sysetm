// function goToSection(section) {
//     document.getElementById(section).scrollIntoView({behavior: "smooth"});
// }

// document.getElementById("btn").onclick = function () {
//     location.href = "<?= ROOT ?>/buses";
// };

// location cards
const cardsContainer = document.querySelector(".cards-container");
const cards = document.querySelectorAll(".card");
const leftArrow = document.querySelector(".left");
const rightArrow = document.querySelector(".right");

for (let i = 0; i < cards.length; i++) {
  cards[i].addEventListener("click", function() {
    for (let j = 0; j < cards.length; j++) {
      cards[j].classList.remove("selected");
    }
    this.classList.add("selected");
  });
}

leftArrow.addEventListener("click", function() {
  for (let i = 0; i < cards.length; i++) {
    if (cards[i].classList.contains("selected")) {
      cards[i].classList.remove("selected");
      if (i > 0) {
        cards[i - 1].classList.add("selected");
        cardsContainer.scrollLeft = cards[i - 1].offsetLeft - cardsContainer.offsetLeft - (cardsContainer.offsetWidth - cards[i - 1].offsetWidth) / 2;
      } else {
        cards[cards.length - 1].classList.add("selected");
        cardsContainer.scrollLeft = cards[cards.length - 1].offsetLeft - cardsContainer.offsetLeft - (cardsContainer.offsetWidth - cards[cards.length - 1].offsetWidth) / 2;
      }
      break;
    }
  }
});

rightArrow.addEventListener("click", function() {
  for (let i = 0; i < cards.length; i++) {
    if (cards[i].classList.contains("selected")) {
      cards[i].classList.remove("selected");
      if (i < cards.length - 1) {
        cards[i + 1].classList.add("selected");
        cardsContainer.scrollLeft = cards[i + 1].offsetLeft - cardsContainer.offsetLeft - (cardsContainer.offsetWidth - cards[i + 1].offsetWidth) / 2;
      } else {
        cards[0].classList.add("selected");
        cardsContainer.scrollLeft = cards[0].offsetLeft - cardsContainer.offsetLeft - (cardsContainer.offsetWidth - cards[0].offsetWidth) / 2;
      }
      break;
    }
  }
});
