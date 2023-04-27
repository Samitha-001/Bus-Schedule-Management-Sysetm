document.addEventListener("DOMContentLoaded", () => {
  
  // select deselect seats
  const seats = document.querySelectorAll(".seat");
  var count = 0; // number of seats chosen
  // array of chosen seats
  var seatsSelected = [];
  let passengerCountInput = document.getElementById("no-of-passengers");
  let passengerCount = 1;
  passengerCountInput.addEventListener("change", function () {
    passengerCount = passengerCountInput.value;
    // console.log(passengerCount);
  });

  seats.forEach((seat) => {
    seat.addEventListener("click", (e) => {
      if (e.target.classList.contains("selected")) {
        e.target.classList.toggle("selected");
        count--;
        // remove seat from array
        seatsSelected = seatsSelected.filter((seat) => {
          return seat !== e.target.getAttribute("data-seat");
        });
      } else {
        if (count < 5) { // single ticket can have max 5 passengers
          if (count < passengerCount) {
            e.target.classList.toggle("selected");
            count++;
            // get data-seat attribute
            seatsSelected.push(e.target.getAttribute("data-seat"));
          } 
          else {
            alert('Increase the number of passengers to reserve more seats');
          }
        } else {
          alert('You can only book 5 seats per ticket');
        }
      }
      // console.log(seatsSelected);
    });
  });


  // show seat reservation div
  document.querySelector("#reserve-seats-q").addEventListener("click", () => {
    document.querySelector("#book-ticket").style.display = "none";
    document.getElementById("buy-tickets-title").innerHTML = "Reserve Seats";

    document.querySelector("#reserve-seats-div").style.display = "block";
    let busType = document.querySelector("#reserve-seats-div").getAttribute("data-bus-type");
    if (busType == 'L') {
      // bus layout 1 for large buses
      console.log("busType == 'L'");
      console.log(busType);
      document.querySelector("#bus-layout-l").style.display = "block";
      document.querySelector("#bus-layout-s").style.display = "none";
    } else {
      // bus layout 2 for small buses
      document.querySelector("#bus-layout-l").style.display = "none";
      document.querySelector("#bus-layout-s").style.display = "block";
    }

  });
  
  
  let seatsSpan = document.getElementById("reserved-seats")
  // confirm seat reservation
  document.querySelector("#reserve-seats-done").addEventListener("click", () => {
    document.querySelector("#reserve-seats-div").style.display = "none";
    document.querySelector("#book-ticket").style.display = "block";
    document.getElementById("buy-tickets-title").innerHTML = "Buy Tickets";
    seatsList = seatsSelected.join(", ");
    // if seatsSelected is empty
    if (seatsList == "") {
      document.getElementById("reserved-seats").innerHTML = "";
      document.getElementById("reserve-seats-q").innerHTML = "Reserve seats?";
      seatsSpan.setAttribute("data-seats-no", 0);
    } else {
      seatsSpan.innerHTML = "Reserved seats: " + seatsList;
      // set data attribute to seatsSpan
      seatsSpan.setAttribute("data-seats-no", seatsSelected.length);
      
      document.getElementById("reserve-seats-q").innerHTML = "&nbsp&nbsp&nbsp Change";
    }
  });
  

  // cancel seat reservation layout Large
  document.querySelector("#reserve-seats-cancel").addEventListener("click", () => {
    document.querySelector("#reserve-seats-div").style.display = "none";
    document.querySelector("#book-ticket").style.display = "block";
    document.getElementById("buy-tickets-title").innerHTML = "Buy Tickets";
  });
  // cancel seat reservation layout Small
  document.querySelector("#reserve-seats-s-cancel").addEventListener("click", () => {
    document.querySelector("#reserve-seats-div").style.display = "none";
    document.querySelector("#book-ticket").style.display = "block";
    document.getElementById("buy-tickets-title").innerHTML = "Buy Tickets";
  });

});
