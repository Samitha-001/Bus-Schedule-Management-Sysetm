document.addEventListener("DOMContentLoaded", function () {
  var currentUrl = window.location.pathname;
  console.log(currentUrl);
  if (
    currentUrl ===
    "/Bus-Schedule-Management-System/bussched/public/passengerprofile"
  ) {
    div1 = document.getElementById("profile");
    div1.style.opacity = 1;
    div2 = document.getElementById("profile-m");
    div2.style.opacity = 1;
  } else if (
    currentUrl ===
    "/Bus-Schedule-Management-System/bussched/public/passengertickets"
  ) {
    div1 = document.getElementById("ticket");
    div1.style.opacity = 1;
    div2 = document.getElementById("ticket-m");
    div2.style.opacity = 1;
  } else if (
    currentUrl ===
    "/Bus-Schedule-Management-System/bussched/public/passengerpoints"
  ) {
    div1 = document.getElementById("points");
    div1.style.opacity = 1;
    div2 = document.getElementById("points-m");
    div2.style.opacity = 1;
  } else if (
    currentUrl ===
    "/Bus-Schedule-Management-System/bussched/public/passengerratings"
  ) {
    div1 = document.getElementById("rating");
    div1.style.opacity = 1;
    div2 = document.getElementById("rating-m");
    div2.style.opacity = 1;
  }
});
