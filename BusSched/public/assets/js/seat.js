document.addEventListener("DOMContentLoaded", () => {
  // select deselct seats
  const seats = document.querySelectorAll(".seat");
  // console.log(seats);
  seats.forEach((seat) => {
    seat.addEventListener("click", (e) => {
      e.target.classList.toggle("selected");
    });
  });

  // show reserve seats
  document.querySelector("#reserve-seats-q").addEventListener("click", () => {
    document.querySelector("#book-ticket").style.display = "none";
    document.querySelector("#reserve-seats").style.display = "block";
  });

  // show book ticket
  document.querySelector("#book-ticket-q").addEventListener("click", () => {
    document.querySelector("#reserve-seats").style.display = "none";
    document.querySelector("#book-ticket").style.display = "block";
  });
});
