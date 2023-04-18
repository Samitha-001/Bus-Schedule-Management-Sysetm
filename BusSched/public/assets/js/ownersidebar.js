document.addEventListener("DOMContentLoaded", function () {
    var currentUrl = window.location.pathname;
    console.log(currentUrl);
    if (currentUrl === '/Bus-Schedule-Management-System/bussched/public/owners') {
        div1 = document.getElementById("dashboard");
        div1.style.color = "white";
    } else if (currentUrl === '/about') {
      div1.style.backgroundColor = "green";
    } else if (currentUrl === '/contact') {
      div1.style.backgroundColor = "red";
    }
  });