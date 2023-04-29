document.addEventListener("DOMContentLoaded", () => {
  // restrict date to be selected today and tomorrow
  // let today = new Date();
  // let tomorrow = new Date();
  // tomorrow.setDate(today.getDate() + 1);

  // document.getElementById("dateInput").min = today.toISOString().split("T")[0];
  // document.getElementById("dateInput").value = today.toISOString().split("T")[0];
  // document.getElementById("dateInput").max = tomorrow.toISOString().split("T")[0];

  // document.getElementById("dateInput").addEventListener("change", function () {
  //   let selectedDate = new Date(this.value);
  // });
  
  // is points balance is insufficient
  const radioButtons = document.querySelectorAll("input[name='payment']");
  const pointsBalance = document.getElementById("pointsBalance");
  const pointsBalanceSpan = document.getElementById("pointsBalanceSpan");
  // get value in td inside pointsBalance
  let points = pointsBalanceSpan.innerHTML;
  // if (points < fare) { // TODO
  // }
  // console.log(points);

  for (const button of radioButtons) {
    button.addEventListener("change", function () {
      if (button.value === "points") {
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

    // reserved seats
    data["seats_reserved"] = document.getElementById("reserved-seats").innerHTML.split(": ")[1];

    // trip id
    tdtrip = document.getElementById("trip-id");
    data["trip_id"] = tdtrip.getAttribute("data-tripid");
    insertRow(data);
    window.location.href = `${ROOT}/passengerschedule`;

  });

  // from to fields when buying ticket
  
  let halts = document.getElementById("halt-list");
  const options = Array.from(halts.options).map(option => option.value);

  var tripStart = "<?php echo $trip->starting_halt ?>";
  if (tripStart=='Pettah') {
    // reverse halt list
    options.reverse();
  }

  let fromInput = document.getElementById("from");
  let toInput = document.getElementById("to");
  let passengerCountInput = document.getElementById("no-of-passengers");
  let passengerCount = 1;
  let reservationChargeSpan = document.getElementById("reservation-charge");
  let fee = document.getElementById("amount-payable");
  let totFareSpan = document.getElementById("total-fare");
  
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
      console.log("to is valid");
      // check if from and to are in the same index
      if (options.indexOf(from) < options.indexOf(to)) {
        data['to'] = to;
        console.log("to is after from");
        toInput.disabled = true;
        // passengerCount = passengerCountInput.value;
        getFare(data);
        // totFareSpan.innerHTML = passengerCount * baseFareLi.innerHTML;
        // calculate fare

      } else {
        alert("Please select a valid destination");
      }
    } else {
      console.log("to is invalid");

      // alert("Please select a valid destination");
    }
  });

  // whenever passenger count is changed
  passengerCountInput.addEventListener("input", function () {
    console.log("passenger count changed");
    passengerCount = passengerCountInput.value;
    // if to input is disabled
    if (totFareSpan.innerHTML!="0") {
      // getFare(data);
      totFareSpan.innerHTML = passengerCount * baseFareLi.innerHTML;
      console.log("PASSENGER COUNT CHANGED");

    }
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
      reservationCharge = Number(reservationChargeSpan.innerHTML);
      totFareSpan.innerHTML = passengerCount * baseFareLi.innerHTML + reservationCharge;
        // return data['data'];
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
  
});