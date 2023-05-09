document.addEventListener("DOMContentLoaded", function () { 
  // redirect to buy ticket
  const collectTicketBtns = document.querySelectorAll('.collect-ticket-btn');

  // Attach click event listeners to each button
  collectTicketBtns.forEach(button => {
      button.addEventListener('click', event => {
          // Get the parent row of the clicked button
          const row = event.target.closest('tr');
          console.log(row);
      
          // Get ID to send to the ticket page
          //  const ticketID = row.getAttribute('ticket_no');
          // alert(ticketID);
          // Get ID to send to the ticket page
      const ticketID = row.querySelector('td[data-fieldname="ticket_number"]').textContent;
      
      var currentUrl = window.location.href;
      // remove last part word after /
      currentUrl = currentUrl.substring(0, currentUrl.lastIndexOf("/"));

      window.location.href = currentUrl + `/collecttickets?ticketID=${ticketID}`;
    
      function cancel() {
        const form = document.getElementById("view_ticket");
        form.style.display = "none";
      }
      });

      const viewticket = document.getElementById('view_ticket');
      const cancelButton = document.getElementById('cancel-button');
      cancelButton.addEventListener('click', () => {
           viewticket.style.display = 'none';
      });

  });





});
  