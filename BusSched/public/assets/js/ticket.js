document.addEventListener("DOMContentLoaded", () => {
  let fromInput = document.getElementById("from");
  let toInput = document.getElementById("to");
  let passengerCountInput = document.getElementById("no-of-passengers");
  let reservationChargeSpan = document.getElementById("reservation-charge");
  let totFareSpan = document.getElementById("total-fare");
  let passengerCount = 1;
  let reservationCharge = 0;
  let reservedSeatsCount = 0;


  // is points balance is insufficient
  const radioButtons = document.querySelectorAll("input[name='payment']");
  const pointsBalance = document.getElementById("pointsBalance");
  const pointsBalanceSpan = document.getElementById("pointsBalanceSpan");
  let points = pointsBalanceSpan.innerHTML;
  let reservedSeatsSpan = document.getElementById("reserved-seats");

  for (const button of radioButtons) {
    button.addEventListener("change", function () {
      if (button.value === "points") {
        if (points-5 < totFareSpan.innerHTML) {
          alert("Insufficient points balance");
          button.checked = false;
          return;
        }
        pointsBalance.style.display = "contents";
      } else {
        pointsBalance.style.display = "none";
      }
    });
  }

  // confirm ticket button
  document.querySelector("#confirm-ticket").addEventListener("click", () => {
    data = {};
    
    let inputs = document.querySelectorAll("input");
    for (let i = 0; i < 3; i++) {
      if (inputs[i].value === "") {
        alert("Please fill all fields");
        return;
      }
      let fieldName = inputs[i].parentElement.getAttribute("data-fieldname");
      data[fieldName] = inputs[i].value;
    }

    // payment method
    data["payment_method"] = document.querySelector("input[name='payment']:checked").value;

    // retrieve seatsSelected from session storage
    let seatsSelected = JSON.parse(sessionStorage.getItem("seatsSelected"));
    data["seats"] = seatsSelected;

    // reserved seats
    data["seats_reserved"] = document.getElementById("reserved-seats").innerHTML.split(": ")[1];

    // 
    // trip id
    tdtrip = document.getElementById("trip-id");
    data["trip_id"] = tdtrip.getAttribute("data-tripid");
    data["price"] = Number(totFareSpan.innerHTML);
    insertRow(data);
    window.location.href = `${ROOT}/passengerschedule`;

  });


  // from to fields when buying ticket
  let halts = document.getElementById("halt-list");
  const options = Array.from(halts.options).map(option => option.value);

  var tripStart = "<?php echo $trip->starting_halt ?>";
  if (tripStart == 'Pettah') {
    // reverse halt list
    options.reverse();
  }
  
  let data = {};

  // whenever from is changed
  fromInput.addEventListener("input", function () {
    let from = document.getElementById("from").value;
    
    // check if from is an option value in halts
    if (options.includes(from)) {
      data['from'] = from;
      console.log("from is valid");
      fromInput.disabled = true;
    } else {
      // alert("Please select a valid starting halt");
    }
  });


  // whenever to is changed
  toInput.addEventListener("input", function () {
    let to = document.getElementById("to").value;

    // check if to is an option value in halts
    if (options.includes(to)) {
      // console.log("to is valid");
      // check if from and to are in the same index
      if (options.indexOf(from) < options.indexOf(to)) {
        data['to'] = to;
        // console.log("to is after from");
        toInput.disabled = true;
        getFare(data);
      } else {
        alert("Please select a valid destination");
      }
    } else {
      // console.log("to is invalid");
      // alert("Please select a valid destination");
    }
  });


  let passengerCountTd = document.getElementById("passenger-count-td");
  let totFareTd = document.getElementById("total-fare-for-tickets-td");
  
  // whenever passenger count is changed
  passengerCountInput.addEventListener("input", function () {
    // console.log("passenger count changed");
    passengerCount = passengerCountInput.value;
    passengerCountTd.innerHTML = passengerCount;
    totFareTd.innerHTML = passengerCount * baseFareLi.innerHTML;

    // if to input is disabled
    if (totFareSpan.innerHTML != "0") {
      if (reservedSeatsSpan.getAttribute("data-seats-no") != "") {
        reservedSeatsCount = reservedSeatsSpan.getAttribute("data-seats-no");
        // console.log("reservedSeatsCount"+reservedSeatsCount);

        reservationChargeSpan.innerHTML = baseFareLi.innerHTML * reservedSeatsCount * 15 / 100;
      }

      reservationCharge = Number(reservationChargeSpan.innerHTML);
      totFareSpan.innerHTML = passengerCount * baseFareLi.innerHTML + reservationCharge;
      
    }
  });
  
  let reservedSeatsTd = document.getElementById("reserved-seats-td");
  // whenever reserved seats are changed
  // checking if the data attribute is changed
  const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
      if (mutation.attributeName === 'data-seats-no') {
        // change the reservation charge
        let reservedSeatsCount = reservedSeatsSpan.getAttribute("data-seats-no");
        reservationChargeSpan.innerHTML = baseFareLi.innerHTML * reservedSeatsCount * 15/100;

        reservedSeatsTd.innerHTML = mutation.target.getAttribute('data-seats-no');
        totFareSpan.innerHTML = passengerCount * baseFareLi.innerHTML + baseFareLi.innerHTML * reservedSeatsCount * 15 / 100;

        disablePoints();
      }
    });
  });
  observer.observe(reservedSeatsSpan, { attributes: true });

  // whenever totFare is changed (points)
  totFareSpan.addEventListener("DOMSubtreeModified", function () {
    // console.log("totFare changed");
    disablePoints();
  });

  

  let baseFareLi = document.getElementById("base-fare");
  
  // api to get calculated fare
  function getFare(data) {
    fetch(`${ROOT}/passengerticket/api_get_fare`, {
      method: "POST",
    credentials: "same-origin",
    mode: "same-origin",
    headers: {
        "Content-Type": "application/json;charset=utf-8",
      },
    body: JSON.stringify(data),
    })
    .then((res) => res.json())
    .catch((error) => console.log(error))
    .then((data) => {
      baseFareLi.innerHTML = `${data['data']}`;
      passengerCount = passengerCountInput.value;
      totFareSpan.innerHTML = passengerCount * baseFareLi.innerHTML + baseFareLi.innerHTML * reservedSeatsCount * 15 / 100;
      reservedSeatsCount = reservedSeatsSpan.getAttribute("data-seats-no");
      
      reservationChargeSpan.innerHTML = baseFareLi.innerHTML * reservedSeatsCount * 15 / 100;
      
      totFareTd.innerHTML = passengerCount * baseFareLi.innerHTML;
    });
}

  function insertRow(data) {
    fetch(`${ROOT}/passengerticket/api_add`, {
      method: "POST",
      credentials: "same-origin",
      mode: "same-origin",
      headers: {
        "Content-Type": "application/json;charset=utf-8",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.json())
      .catch((error) => console.log(error))
      .then((data) => {
        console.log(data);
      });
  }

  // cancel ticket button
  document.querySelector("#cancel-ticket").addEventListener("click", () => {
    window.location.href = `${ROOT}/passengerschedule`;
  });

  // change source and destination
  document.querySelector("#change-src-dest").addEventListener("click", () => {
    fromInput.disabled = false;
    toInput.disabled = false;
    fromInput.value = "";
    toInput.value = "";
  });

  // function to disable points radio if points balance is insufficient
  function disablePoints() {
    if (points-5 < Number(totFareSpan.innerHTML)) {
      // make radio unchecked
      document.getElementById("points").checked = false;
      // disable radio button
      document.getElementById("points").disabled = true;
      
    }
    else {
      // enable radio button
      document.getElementById("points").disabled = false;
    }
  }
});