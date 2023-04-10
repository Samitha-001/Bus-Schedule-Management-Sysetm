document.addEventListener("DOMContentLoaded", function () {
    var showAllTickets = document.getElementById("show-all-tickets");
    var showBookedTickets = document.getElementById("show-booked-tickets");
    var showCollectedTickets = document.getElementById("show-collected-tickets");
    var showExpiredTickets = document.getElementById("show-expired-tickets");

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
    });

    // add event listener to showCollectedTickets
    showCollectedTickets.addEventListener("click", function () {
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
    });

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
    });


    // collected ticket view more
    let collectedTicketViewMoreBtns = document.querySelectorAll(".ticket-view-more");

    // add event listener to each button
    collectedTicketViewMoreBtns.forEach(button => {
        button.addEventListener("click", function () {
            // get the ticket id
            // let ticketId = button.getAttribute("data-ticket-id");

            // get the ticket details
            let ticketDetails = document.getElementById("collected-ticket-details");
            ticketDetails.style.display = "block";
            collectedTicketsDiv.style.display = "none";
        });
    });
});