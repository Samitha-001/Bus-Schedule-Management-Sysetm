// document.addEventListener("DOMContentLoaded", function() {
//     // redirect to conductor location page
//     const starttripBtns = document.querySelectorAll('.start-trip-btn');
  
//     // Attach click event listeners to each button
//     starttripBtns.forEach(button => {
//       button.addEventListener('click', event => {
//         event.preventDefault();
//         // Get the parent row of the clicked button
//         const row = event.target.closest('tr');
//         console.log(row);
        
//         // Get ID to send to the conductor location page
//         const tripID = row.querySelector('td[data-fieldname="trip_id"]').textContent;
        
//         // Redirect to conductor location page with the trip ID
//         window.location.href = `conductorlocations.php?trip_id=${tripID}`;
//       });
//     });
//   });