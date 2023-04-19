document.addEventListener("DOMContentLoaded", function () {
  var showAllTickets = document.getElementById("show-all-tickets");
  var showBookedTickets = document.getElementById("show-booked-tickets");
  var showCollectedTickets = document.getElementById("show-collected-tickets");
  var showExpiredTickets = document.getElementById("show-expired-tickets");
  var showInactiveTickets = document.getElementById("show-inactive-tickets");
  let ticketDetails = document.getElementById("collected-ticket-details");

  let allTicketsDiv = document.getElementById("all-tickets");

  let bookedTicketsDiv = document.getElementById("booked-tickets");
  bookedTicketsDiv.style.display = "none";

  let collectedTicketsDiv = document.getElementById("collected-tickets");
  collectedTicketsDiv.style.display = "none";

  let expiredTicketsDiv = document.getElementById("expired-tickets");
  expiredTicketsDiv.style.display = "none";

  let inactiveTicketsDiv = document.getElementById("inactive-tickets");

  // update location and earn points
  let updateLocationBtn = document.getElementById("a-update-location");
  let updateLocationDiv = document.getElementById("update-location-div");
  let updateLocationH = document.getElementById("update-location-h");
  let insideLocationDiv = document.getElementById("inside-update-location-div");

  // add event listener to showAllTickets
  showAllTickets.addEventListener("click", function () {
    // add class selected
    showAllTickets.classList.add("selected");
    // remove class selected from other buttons
    showBookedTickets.classList.remove("selected");
    showCollectedTickets.classList.remove("selected");
    showExpiredTickets.classList.remove("selected");
    showInactiveTickets.classList.remove("selected");

    // show all tickets
    allTicketsDiv.style.display = "grid";
    bookedTicketsDiv.style.display = "none";
    collectedTicketsDiv.style.display = "none";
    expiredTicketsDiv.style.display = "none";
    inactiveTicketsDiv.style.display = "none";
    ticketDetails.style.display = "none";
    updateLocationDiv.style.display = "none";
  });

  // add event listener to showBookedTickets
  showBookedTickets.addEventListener("click", function () {
    // add class selected
    showBookedTickets.classList.add("selected");
    // remove class selected from other buttons
    showAllTickets.classList.remove("selected");
    showCollectedTickets.classList.remove("selected");
    showExpiredTickets.classList.remove("selected");
    showInactiveTickets.classList.remove("selected");

    // show booked tickets
    allTicketsDiv.style.display = "none";
    bookedTicketsDiv.style.display = "grid";
    collectedTicketsDiv.style.display = "none";
    expiredTicketsDiv.style.display = "none";
    inactiveTicketsDiv.style.display = "none";
    ticketDetails.style.display = "none";
    updateLocationDiv.style.display = "none";
  });

  // Function to show collected tickets
  function showCollectedTicketsFunc() {
    // add class selected
    showCollectedTickets.classList.add("selected");
    // remove class selected from other buttons
    showAllTickets.classList.remove("selected");
    showBookedTickets.classList.remove("selected");
    showExpiredTickets.classList.remove("selected");
    showInactiveTickets.classList.remove("selected");

    // show collected tickets
    allTicketsDiv.style.display = "none";
    bookedTicketsDiv.style.display = "none";
    collectedTicketsDiv.style.display = "grid";
    expiredTicketsDiv.style.display = "none";
    inactiveTicketsDiv.style.display = "none";
    ticketDetails.style.display = "none";
    updateLocationDiv.style.display = "none";
  }

  // add event listener to showExpiredTickets
  showExpiredTickets.addEventListener("click", function () {
    // add class selected
    showExpiredTickets.classList.add("selected");
    // remove class selected from other buttons
    showAllTickets.classList.remove("selected");
    showBookedTickets.classList.remove("selected");
    showCollectedTickets.classList.remove("selected");
    showInactiveTickets.classList.remove("selected");

    // show expired tickets
    allTicketsDiv.style.display = "none";
    bookedTicketsDiv.style.display = "none";
    collectedTicketsDiv.style.display = "none";
    expiredTicketsDiv.style.display = "grid";
    inactiveTicketsDiv.style.display = "none";
    ticketDetails.style.display = "none";
    updateLocationDiv.style.display = "none";
  });

  // add event listener to showInactiveTickets
  showInactiveTickets.addEventListener("click", function () {
    // add class selected
    showInactiveTickets.classList.add("selected");
    // remove class selected from other buttons
    showAllTickets.classList.remove("selected");
    showBookedTickets.classList.remove("selected");
    showCollectedTickets.classList.remove("selected");
    showExpiredTickets.classList.remove("selected");
    showInactiveTickets.classList.add("selected");

    // show inactive tickets
    allTicketsDiv.style.display = "none";
    bookedTicketsDiv.style.display = "none";
    collectedTicketsDiv.style.display = "none";
    expiredTicketsDiv.style.display = "none";
    inactiveTicketsDiv.style.display = "grid";
    ticketDetails.style.display = "none";
    updateLocationDiv.style.display = "none";
  });

  // collected ticket view more
  let collectedTicketViewMoreBtns =
    document.querySelectorAll(".ticket-view-more");

  // add event listeners to each button
  collectedTicketViewMoreBtns.forEach((button) => {
    button.addEventListener("click", function () {
      ticketDetails.style.display = "block";
      // get data-id from e.parent
      let ticketId = button.getAttribute("data-ticket-id");

      let ticket = getTicketDetails(ticketId);
      ticket.then((ticket) => {
        // updating values of ticket details tds
        let tds = ticketDetails.querySelectorAll("td");
        for (let i = 0; i < 4; i++) {
          let tdName = tds[i].getAttribute("name");
          tds[i].innerHTML = ticket[tdName];
        }

        // get halts for update location div
        let halts = getHalts(ticket["source_halt"], ticket["dest_halt"]);
        halts.then((halts) => {
          halts.forEach((halt) => {
            //   make new div for each halt
            let haltDiv = document.createElement("div");
            insideLocationDiv.appendChild(haltDiv);
            haltDiv.classList.add("location-update-card");
            // add id to div
            haltDiv.setAttribute("id", halt);
            //   add halt name to div
            haltDiv.innerHTML = halt;
            let haltP = document.createElement("p");
            haltDiv.appendChild(haltP);
          });
        });
        collectedTicketsDiv.style.display = "none";
      });
    });
  });

  // collected ticket view more close button
  ticketDetails
    .getElementsByTagName("img")[0]
    .addEventListener("click", function () {
      ticketDetails.style.display = "none";
      collectedTicketsDiv.style.display = "grid";
    });

  // got off the bus popup div
  let gotOffBusPopup = document.getElementById("gotoff-popup");

  // a-got-off
  let gotOffBusBtn = document.getElementById("a-got-off");
  gotOffBusBtn.addEventListener("click", function () {
    // if has class disabled, return
    if (!gotOffBusBtn.classList.contains("disabled"))
      gotOffBusPopup.style.display = "block";
  });

  // GOT OFF THE BUS
  // confirm got off
  document.getElementById("btn-got-off-yes").addEventListener("click", function () {
      // TODO implement yes button
      showCollectedTicketsFunc();
      gotOffBusPopup.style.display = "none";
      passengerGotOffBus();
    });
  // got off from a different halt
  document.getElementById("btn-got-off-cancel").addEventListener("click", function () {
      // TODO implement no button
      gotOffBusPopup.style.display = "none";
    });

  // got off the bus popup close button
  let gotOffBusPopupCloseBtn = gotOffBusPopup.getElementsByTagName("img")[0];

  // close button
  gotOffBusPopupCloseBtn.addEventListener("click", function () {
    gotOffBusPopup.style.display = "none";
  });

  // show collected tickets function
  showCollectedTickets.addEventListener("click", function () {
    showCollectedTicketsFunc();
  });

  // update location and earn points
  updateLocationBtn.addEventListener("click", function () {
    updateLocationDiv.style.display = "block";
    updateLocationH.style.display = "block";
    // add class disabled to gotOffBusBtn
    updateLocationBtn.classList.add("disabled");
    gotOffBusBtn.classList.add("disabled");
  });

  // update location popup cancel button
  let updateLocationCancelBtn = document.getElementById(
    "btn-update-location-cancel"
  );
  updateLocationCancelBtn.addEventListener("click", function () {
    updateLocationDiv.style.display = "none";
    gotOffBusBtn.classList.remove("disabled");
    updateLocationBtn.classList.remove("disabled");
    updateLocationH.style.display = "none";
  });

  // add event listeners for each locationDivs
  insideLocationDiv.addEventListener("click", function (e) {
    if (e.target.classList.contains("location-update-card")) {
      // if clicked on a div with class location-update-card
      let locationDivs = document.querySelectorAll(".location-update-card");
      // remove class from each location div
      locationDivs.forEach((div) => {
        div.classList.remove("selected-halt");
        div.getElementsByTagName("p")[0].innerHTML = " ";
      });

      let div = e.target;
      div.classList.add("selected-halt");
      div.getElementsByTagName("p")[0].innerHTML = "Reached?";
      updateLocationDiv.getElementsByTagName("h1")[0].innerHTML = div.getAttribute("id");
    }
  });
  
  // update location confirm button
  let updateLocationConfirmBtn = document.getElementById("btn-update-location-confirm");
  updateLocationConfirmBtn.addEventListener("click", function () {
    // TODO implement updating location (make ticket inactive)
    updateLocationDiv.style.display = "none";
    // remove class disabled from gotOffBusBtn
    gotOffBusBtn.classList.remove("disabled");
    updateLocationBtn.classList.remove("disabled");
    ticketDetails.style.display = "none";
    updateLocationH.style.display = "none";
    showCollectedTicketsFunc();
  });

  // passenger got off bus update database function
  function passengerGotOffBus() {
    // updating database
    // get data attribute from updateLocationDiv
    let ticketId = updateLocationDiv.getAttribute("data-ticket-id");
    let data = { id: ticketId };

    // send data to server
    let url = `${ROOT}/passengertickets/api_update_location`;
    let options = {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    };
    fetch(url, options)
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
      })
      .catch((error) => {
        console.log(error);
      });
  }

  // get ticket details function
  function getTicketDetails(ticketId) {
    var ticket = {};
    let data = { id: ticketId };
    // send data to server
    let url = `${ROOT}/passengertickets/api_read_ticket`;
    let options = {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    };
    return fetch(url, options)
      .then((response) => response.json())
      .then((data) => {
        return data.data;
      })
      .catch((error) => {
        console.log(error);
      });
  }

  // get halts for location update div
  function getHalts(src, dest) {
    let data = { src: src, dest: dest };
    // send data to server
    let url = `${ROOT}/passengertickets/api_read_halts`;
    let options = {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    };
    return fetch(url, options)
      .then((response) => response.json())
      .then((data) => {
        return data.data;
      })
      .catch((error) => {
        console.log(error);
      });
  }
});
