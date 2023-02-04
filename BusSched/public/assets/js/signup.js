// document.addEventListener("DOMContentLoaded", () => {
document.querySelector(".conductor-button").addEventListener("click", () => {
  document.querySelector(".passenger-signup").style.display = "none";
  document.querySelector(".conductor-signup").style.display = "block";
  document.querySelector(".driver-signup").style.display = "none";
  document.querySelector(".owner-signup").style.display = "none";
  document.querySelector(".scheduler-signup").style.display = "none";
});

document.querySelector(".driver-button").addEventListener("click", () => {
  document.querySelector(".passenger-signup").style.display = "none";
  document.querySelector(".conductor-signup").style.display = "none";
  document.querySelector(".driver-signup").style.display = "block";
  document.querySelector(".owner-signup").style.display = "none";
  document.querySelector(".scheduler-signup").style.display = "none";
});

document.querySelector(".owner-button").addEventListener("click", () => {
  document.querySelector(".passenger-signup").style.display = "none";
  document.querySelector(".conductor-signup").style.display = "none";
  document.querySelector(".driver-signup").style.display = "none";
  document.querySelector(".owner-signup").style.display = "block";
  document.querySelector(".scheduler-signup").style.display = "none";
});

document.querySelector(".scheduler-button").addEventListener("click", () => {
  document.querySelector(".passenger-signup").style.display = "none";
  document.querySelector(".conductor-signup").style.display = "none";
  document.querySelector(".driver-signup").style.display = "none";
  document.querySelector(".owner-signup").style.display = "none";
  document.querySelector(".scheduler-signup").style.display = "block";
});

document.querySelector(".passenger-button").addEventListener("click", () => {
  document.querySelector(".passenger-signup").style.display = "block";
  document.querySelector(".conductor-signup").style.display = "none";
  document.querySelector(".driver-signup").style.display = "none";
  document.querySelector(".owner-signup").style.display = "none";
  document.querySelector(".scheduler-signup").style.display = "none";
});
// });
