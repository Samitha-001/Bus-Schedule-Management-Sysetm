document.addEventListener("DOMContentLoaded", () => {
  // select deselct seats
  const seats = document.querySelectorAll(".seat");
  console.log(seats);
  seats.forEach((seat) => {
    seat.addEventListener("click", (e) => {
      e.target.classList.toggle("selected");
    });
  });

  // show reserve seats
  document.querySelector("#reserve-seats").addEventListener("click", () => {
    // make div invisible
    document.querySelector("#buy-tickets").style.display = "none";
  });
});
