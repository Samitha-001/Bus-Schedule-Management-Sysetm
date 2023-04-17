document.addEventListener("DOMContentLoaded", function () {
  var showAllTickets = document.getElementById("show-all-tickets");
  var showBookedTickets = document.getElementById("show-booked-tickets");
  var showCollectedTickets = document.getElementById("show-collected-tickets");
  var showExpiredTickets = document.getElementById("show-expired-tickets");
  let ticketDetails = document.getElementById("collected-ticket-details");

  let allTicketsDiv = document.getElementById("all-tickets");
  let bookedTicketsDiv = document.getElementById("booked-tickets");
  bookedTicketsDiv.style.display = "none";

  let collectedTicketsDiv = document.getElementById("collected-tickets");
  collectedTicketsDiv.style.display = "none";

  let expiredTicketsDiv = document.getElementById("expired-tickets");
  expiredTicketsDiv.style.display = "none";

  // add event listener to showAllTickets
  showAllTickets.addEventListener("click", function () {
    // add class selected
    showAllTickets.classList.add("selected");
    // remove class selected from other buttons
    showBookedTickets.classList.remove("selected");
    showCollectedTickets.classList.remove("selected");
    showExpiredTickets.classList.remove("selected");

    // show all tickets
    allTicketsDiv.style.display = "grid";
    bookedTicketsDiv.style.display = "none";
    collectedTicketsDiv.style.display = "none";
    expiredTicketsDiv.style.display = "none";
    ticketDetails.style.display = "none";
  });

  // add event listener to showBookedTickets
  showBookedTickets.addEventListener("click", function () {
    // add class selected
    showBookedTickets.classList.add("selected");
    // remove class selected from other buttons
    showAllTickets.classList.remove("selected");
    showCollectedTickets.classList.remove("selected");
    showExpiredTickets.classList.remove("selected");

    // show booked tickets
    allTicketsDiv.style.display = "none";
    bookedTicketsDiv.style.display = "grid";
    collectedTicketsDiv.style.display = "none";
    expiredTicketsDiv.style.display = "none";
    ticketDetails.style.display = "none";
  });

  // Function to show collected tickets
  function showCollectedTicketsFunc() {
    // add class selected
    showCollectedTickets.classList.add("selected");
    // remove class selected from other buttons
    showAllTickets.classList.remove("selected");
    showBookedTickets.classList.remove("selected");
    showExpiredTickets.classList.remove("selected");

    // show collected tickets
    allTicketsDiv.style.display = "none";
    bookedTicketsDiv.style.display = "none";
    collectedTicketsDiv.style.display = "grid";
    expiredTicketsDiv.style.display = "none";
    ticketDetails.style.display = "none";
  }

  // add event listener to showExpiredTickets
  showExpiredTickets.addEventListener("click", function () {
    // add class selected
    showExpiredTickets.classList.add("selected");
    // remove class selected from other buttons
    showAllTickets.classList.remove("selected");
    showBookedTickets.classList.remove("selected");
    showCollectedTickets.classList.remove("selected");

    // show expired tickets
    allTicketsDiv.style.display = "none";
    bookedTicketsDiv.style.display = "none";
    collectedTicketsDiv.style.display = "none";
    expiredTicketsDiv.style.display = "grid";
    ticketDetails.style.display = "none";
  });

  // collected ticket view more
  let collectedTicketViewMoreBtns =
    document.querySelectorAll(".ticket-view-more");

  // add event listener to each button
  collectedTicketViewMoreBtns.forEach((button) => {
    button.addEventListener("click", function () {
      ticketDetails.style.display = "block";
      collectedTicketsDiv.style.display = "none";
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
    gotOffBusPopup.style.display = "block";
  });

  // GOT OFF THE BUS
  // confirm got off
  document
    .getElementById("btn-got-off-yes")
    .addEventListener("click", function () {
      // TODO implement yes button
      showCollectedTicketsFunc();
      gotOffBusPopup.style.display = "none";
    });
  // got off from a different halt
  document
    .getElementById("btn-got-off-cancel")
    .addEventListener("click", function () {
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
    let updateLocationBtn = document.getElementById("a-update-location");
    let updateLocationDiv = document.getElementById("update-location-div");

    updateLocationBtn.addEventListener("click", function () {
        updateLocationDiv.style.display = "block";
        
    });
    
    // update location popup close button
    let updateLocationDivCloseBtn = updateLocationDiv.getElementsByTagName("img")[0];

});
