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
  
  const radioButtons = document.querySelectorAll("input[name='payment']");
  const pointsBalance = document.getElementById("pointsBalance");
  
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