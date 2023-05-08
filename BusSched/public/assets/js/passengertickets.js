document.addEventListener("DOMContentLoaded", function () {
  var showAllTickets = document.getElementById("show-all-tickets");
  var showBookedTickets = document.getElementById("show-booked-tickets");
  var showCollectedTickets = document.getElementById("show-collected-tickets");
  var showExpiredTickets = document.getElementById("show-expired-tickets");
  var showInactiveTickets = document.getElementById("show-inactive-tickets");
  let ticketDetails = document.getElementById("collected-ticket-details");
  let ratePopup = document.getElementById("rate-popup");
  let gotOffBusYesBtn = document.getElementById("btn-got-off-yes");

  let allTicketsDiv = document.getElementById("all-tickets");
  allTicketsDiv.style.display = "none";

  let bookedTicketsDiv = document.getElementById("booked-tickets");
  bookedTicketsDiv.style.display = "flex";

  let collectedTicketsDiv = document.getElementById("collected-tickets");
  collectedTicketsDiv.style.display = "none";

  let expiredTicketsDiv = document.getElementById("expired-tickets");
  expiredTicketsDiv.style.display = "none";

  let inactiveTicketsDiv = document.getElementById("inactive-tickets");
  inactiveTicketsDiv.style.display = "none";

  // update location and earn points
  let updateLocationBtn = document.getElementById("a-update-location");
  let updateLocationDiv = document.getElementById("update-location-div");
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
    allTicketsDiv.style.display = "block";
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
    bookedTicketsDiv.style.display = "flex";
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
    collectedTicketsDiv.style.display = "flex";
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
    expiredTicketsDiv.style.display = "block";
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

    // show inactive tickets
    allTicketsDiv.style.display = "none";
    bookedTicketsDiv.style.display = "none";
    collectedTicketsDiv.style.display = "none";
    expiredTicketsDiv.style.display = "none";
    inactiveTicketsDiv.style.display = "block";
    ticketDetails.style.display = "none";
    updateLocationDiv.style.display = "none";
  });

  // collected ticket view more
  let collectedTicketViewMoreBtns = document.querySelectorAll(".ticket-view-more");

  
  // function to check if the halt was passed
  async function haltPassedFunc(halt, haltToCompareWith, sourceHalt, destHalt) {
    // get halts
    let halts = getHalts(sourceHalt, destHalt);
    // add each halt of promise to array
    halts.then((halts) => {
      let haltsList = [];
      halts.forEach((halt) => {
        haltsList.push(halt);
      });
      // get the index of halt in halts array
      let haltIndex = haltsList.indexOf(halt);
      let haltToCompareWithIndex = haltsList.indexOf(haltToCompareWith);

      // if halt is before haltToCompareWith
      if (haltIndex <= haltToCompareWithIndex) {
        // halt passed
        document.getElementById(halt).classList.add("halt-passed");
        return true;
      }
      
      // halt was not passed
        document.getElementById(halt).classList.remove("halt-passed");
        return false;
    });

  }


  // add event listeners to each button
  collectedTicketViewMoreBtns.forEach((button) => {
    button.addEventListener("click", function () {
      let ticketId = button.getAttribute("data-ticket-id");

      // show ticket details
      ticketDetails.style.display = "block";
      // add data-ticket-id to ticket details div
      ticketDetails.setAttribute("data-ticket-id", ticketId);

      let ticketDeets = getTicketDetails(ticketId);
      ticketDeets.then((ticket) => {
        // filling ticket details div
        // source halt
        document.getElementById("ticket-details-from").innerHTML = ticket['ticket']["source_halt"];
        // destination halt
        document.getElementById("ticket-details-to").innerHTML = ticket['ticket']["dest_halt"];

        // arrival time
        document.getElementById("ticket-details-arrival").innerHTML = ticket['ticket']["arrival_time"];
        // departure time
        document.getElementById("ticket-details-departure").innerHTML = ticket['ticket']["departure_time"];

        // trip ID
        document.getElementById("ticket-details-trip").innerHTML = ticket['ticket']["trip_id"];
        // ticket ID
        document.getElementById("ticket-details-ticket").innerHTML = ticket['ticket']["id"];

        // bus number
        document.getElementById("ticket-details-bus").innerHTML = ticket['trip']["bus_no"];
        // number of passengers
        document.getElementById("ticket-details-passengers").innerHTML = ticket['ticket']["passenger_count"];

        // seats
        document.getElementById("ticket-details-seats").innerHTML = ticket['ticket']["seat_number"];
        // booking time
        document.getElementById("ticket-details-booking-time").innerHTML = ticket['ticket']["booking_time"];

        // price
        document.getElementById("ticket-details-price").innerHTML = ticket['ticket']["price"];
        // collected at
        document.getElementById("ticket-details-collected").innerHTML = ticket['ticket']["collected_time"];

        // last updated halt
        if (ticket['trip']["last_updated_halt"] == null) {
          document.getElementById("ticket-details-last-updated").innerHTML = "Not updated";
          document.getElementById("ticket-details-last-updated-at").innerHTML = "";
        } else {
          document.getElementById("ticket-details-last-updated").innerHTML = ticket['trip']["last_updated_halt"];
          document.getElementById("ticket-details-last-updated-at").innerHTML = ticket['trip']["location_updated_time"];
        }

        // update destination of got off popup
        document.getElementById("got-off-dest").innerHTML = ticket['ticket']["dest_halt"];

        // get halts for update location div
        let halts = getHalts(ticket['ticket']["source_halt"], ticket['ticket']["dest_halt"]);
        
        let lastUpdatedHalt = ticket['trip']["last_updated_halt"];
        
        halts.then((halts) => {
          halts.forEach((halt) => {
            // make new div for each halt
            let haltDiv = document.createElement("div");
            insideLocationDiv.appendChild(haltDiv);
            haltDiv.classList.add("location-update-card");

            // add id to div
            haltDiv.setAttribute("id", halt);

            // add halt name to div
            haltDiv.innerHTML = halt;
            let haltP = document.createElement("p");
            haltDiv.appendChild(haltP);


            // check if the halt was passed
            // if yes, add class passed
            let src = ticket['trip']["starting_halt"];
            let dest = (src == "Piliyandala") ? "Pettah" : "Piliyandala";
            
            haltPassedFunc(halt, lastUpdatedHalt, src, dest);
            
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
      collectedTicketsDiv.style.display = "flex";

      updateLocationDiv.style.display = "none";
      gotOffBusBtn.classList.remove("disabled");
      updateLocationBtn.classList.remove("disabled");

      let locationDivs = document.querySelectorAll(".location-update-card");

      // remove class from each location div
      locationDivs.forEach((div) => {
        // delete div
        div.remove();
        // div.classList.remove("selected-halt");
        div.getElementsByTagName("p")[0].innerHTML = " ";
    
        updateLocationDiv.getElementsByTagName("h1")[0].innerHTML = " ";
      });
    });

  // got off the bus popup div
  let gotOffBusPopup = document.getElementById("gotoff-popup");

  // a-got-off
  let gotOffBusBtn = document.getElementById("a-got-off");
  gotOffBusBtn.addEventListener("click", function () {
    // if has class disabled, return
    if (!gotOffBusBtn.classList.contains("disabled")) {
      gotOffBusYesBtn.setAttribute("data-ticket-id", ticketDetails.getAttribute("data-ticket-id"));
      gotOffBusPopup.style.display = "block";
    }
  });

  // GOT OFF THE BUS
  // confirm got off
  gotOffBusYesBtn.addEventListener("click", function () {
    showCollectedTicketsFunc();
    ratePopup.style.display = "block";
    gotOffBusPopup.style.display = "none";
    passengerGotOffBus();
    
    // filling rating popup
    // get ticket id
    let ticketId = gotOffBusYesBtn.getAttribute("data-ticket-id");
    let ticketDeets = getTicketDetails(ticketId);
    // TICKET DETAILS FOR RATING
    ticketDeets.then((ticket) => {
      // add data attributes to ratepopup
      ratePopup.setAttribute("data-ticket-id", ticket['ticket']["id"]);
      ratePopup.setAttribute("data-rater", ticket['ticket']["passenger"]);
      ratePopup.setAttribute("data-trip-id", ticket['ticket']["trip_id"]);
      ratePopup.setAttribute("data-bus-no", ticket['trip']["bus_no"]);
      ratePopup.setAttribute("data-conductor-id", ticket['bus']["conductor"]);
      ratePopup.setAttribute("data-driver-id", ticket['bus']["driver"]);
    });
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
    updateLocationDiv.style.display = "none";
    gotOffBusPopup.style.display = "none";
  });

  // show collected tickets function
  showCollectedTickets.addEventListener("click", function () {
    showCollectedTicketsFunc();
  });

  // update location and earn points
  updateLocationBtn.addEventListener("click", function () {
    updateLocationDiv.style.display = "block";
    updateLocationBtn.classList.add("disabled");
    gotOffBusBtn.classList.add("disabled");
  });

  // update location popup cancel button
  let updateLocationCancelBtn = document.getElementById(
    "btn-update-location-cancel"
  );
  updateLocationCancelBtn.addEventListener("click", function () {
    
    updateLocationDiv.getElementsByTagName("h1")[0].innerHTML = "";
    updateLocationDiv.style.display = "none";
    gotOffBusBtn.classList.remove("disabled");
    updateLocationBtn.classList.remove("disabled");

    let locationDivs = document.querySelectorAll(".location-update-card");
    // remove class from each location div
    locationDivs.forEach((div) => {
      div.classList.remove("selected-halt");
      div.getElementsByTagName("p")[0].innerHTML = " ";
    
    });

  });

  // add event listeners for each locationDivs
  insideLocationDiv.addEventListener("click", function (e) {
    if (e.target.classList.contains("location-update-card") && !e.target.classList.contains("halt-passed")) {
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
    updateLocationDiv.style.display = "none";
    gotOffBusBtn.classList.remove("disabled");
    updateLocationBtn.classList.remove("disabled");
    // ticketDetails.style.display = "none";

    let halt = updateLocationDiv.getElementsByTagName("h1")[0].innerHTML
    let ticketId = ticketDetails.getAttribute("data-ticket-id");
    let username = ticketDetails.getAttribute("data-username");
    // trip ID
    let tripID = document.getElementById("ticket-details-trip").innerHTML;

    let data = { id: ticketId, username: username, user_role: 'passenger', tripID: tripID, halt: halt, gotoff: false };
    
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
    
    // showCollectedTicketsFunc();
  });


  // rate bus, driver and conductor
  let skipRatingBtn = document.getElementById("btn-rate-skip");
  skipRatingBtn.addEventListener("click", function () {
    ratePopup.style.display = "none";
    gotOffBusPopup.style.display = "none";
    window.location.reload();
  });

  let rateBus = document.getElementById("btn-rate");
  rateBus.addEventListener("click", function () {
    // get the forms in rate popup
    let rateForms = ratePopup.querySelectorAll("form");
    // get value of selected radio input
    let driverRating = rateForms[0].querySelector("input:checked").value;
    let conductorRating = rateForms[1].querySelector("input:checked").value;
    let busRating = rateForms[2].querySelector("input:checked").value;


    // get data attributes from ratePopup
    let ticketId = ratePopup.getAttribute("data-ticket-id");
    let rater = ratePopup.getAttribute("data-rater");
    let tripId = ratePopup.getAttribute("data-trip-id");
    let busNo = ratePopup.getAttribute("data-bus-no");
    let conductorId = ratePopup.getAttribute("data-conductor-id");
    let driverId = ratePopup.getAttribute("data-driver-id");

    // TODO
    // let data = { trip_id: tripId, bus_rating: busRating, conductor_rating: conductorRating, driver_rating: driverRating };
    let data = { 'ticket_id': ticketId, 'rater': rater, 'trip_id': tripId, 'driver': driverId, 'driver_rating': driverRating, 'conductor': conductorId, 'conductor_rating': conductorRating, 'bus_no': busNo, 'bus_rating': busRating };

    // call function to send data to server
    updateRating(data);
    window.location.reload();
  });
  
  // passenger got off bus update database function
  function passengerGotOffBus() {
    // get data attribute from updateLocationDiv
    // get value of element
    let ticketId = ticketDetails.getAttribute("data-ticket-id");
    let dest = document.getElementById("got-off-dest").innerHTML;
    
    // get username
    let username = ticketDetails.getAttribute("data-username");
    let data = { id: ticketId, username: username, user_role: 'passenger', halt: dest, gotoff: true };

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
    // var ticket = {};
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
        console.log(data);
        return data.data;
      })
      .catch((error) => {
        console.log(error);
      });
  }

  // function to get halts between given src and dest (for location update div)
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

  // update rating function
  function updateRating(data) {
    let url = `${ROOT}/passengertickets/api_add_rating`;
    
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

});
