document.addEventListener("DOMContentLoaded", () => {
  var pdiv = document.querySelector(".passenger-signup");
  var cdiv = document.querySelector(".conductor-signup");
  var ddiv = document.querySelector(".driver-signup");
  var odiv = document.querySelector(".owner-signup");
  var sdiv = document.querySelector(".scheduler-signup");

  // create array of all divs
  var divs = [pdiv, cdiv, ddiv, odiv, sdiv];

  // function to hide all divs
  function hideAll() {
    divs.forEach((div) => {
      div.style.display = "none";
    });
  }

  document.querySelectorAll(".conductor-button").forEach((button) => {
    button.addEventListener("click", () => {
      hideAll();
      cdiv.style.display = "block";
    });
  });

  document.querySelectorAll(".driver-button").forEach((button) => {
    button.addEventListener("click", () => {
      hideAll();
      ddiv.style.display = "block";
    });
  });

  document.querySelectorAll(".owner-button").forEach((button) => {
    button.addEventListener("click", () => {
      hideAll();
      odiv.style.display = "block";
    });
  });

  document.querySelectorAll(".scheduler-button").forEach((button) => {
    button.addEventListener("click", () => {
      hideAll();
      sdiv.style.display = "block";
    });
  });

  document.querySelectorAll(".passenger-button").forEach((button) => {
    button.addEventListener("click", () => {
      hideAll();
      pdiv.style.display = "block";
    });
  });
});
