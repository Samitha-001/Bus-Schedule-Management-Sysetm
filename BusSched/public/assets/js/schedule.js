document.addEventListener("DOMContentLoaded", function () {
    // remove earlier inputs from URL when refreshed
    const urlParams = new URLSearchParams(window.location.search);
    const fromParam = urlParams.get('from');

    // If the ?from parameter is present, remove it from the URL
    if (fromParam) {
        const newUrl = window.location.href.replace(`?from=${fromParam}`, '');
        history.replaceState(null, null, newUrl);
    }
    
    // Get the input elements
    const fromInput = document.getElementById('from');
    const toInput = document.getElementById('to');
    const dateInput = document.getElementById('date');

    // Get the data rows
    const rows = document.querySelectorAll('.data-row');

    // Add an event listener to the input fields
    fromInput.addEventListener('input', filterRows);
    toInput.addEventListener('input', filterRows);
    dateInput.addEventListener('input', filterRows);

    function filterRows() {
        // Get the input values
        const fromValue = fromInput.value.toLowerCase();
        const toValue = toInput.value.toLowerCase();
        const dateValue = dateInput.value;

        // console.log(dateValue);
        
        // Filter the rows
        const filteredRows = [];
        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            // [data-fieldname="starting_halt"] and [data-fieldname="destination_halt"] and [data-fieldname="date"] are the data-fieldnames of the columns in the table
            const value = row.querySelector('[data-fieldname="starting_halt"]').textContent.toLowerCase();
            // const value1 = row.querySelector('[data-fieldname="destination_halt"]').textContent.toLowerCase();
            const value2 = row.querySelector('[data-fieldname="trip_date"]').textContent;

            // console.log(value2);

            // const value = row.querySelector('[data-fieldname="starting_halt"]').textContent.toLowerCase();
            // console.log(value);
            if (value.includes(fromValue)) {
                // if (value1.includes(toValue)) {
                // if value2 is null or value 2 is equal to dateValue
                    if (value2.includes(dateValue) || value2 == "") {
                        filteredRows.push(row);
                    }
                    // filteredRows.push(row);
                // }
            }
        }

        // Update the view to show only the filtered rows
        rows.forEach(row => row.style.display = 'none');
        filteredRows.forEach(row => row.style.display = 'table-row');
    }
    
    filterRows();


    // redirect to buy ticket
    const buyTicketBtns = document.querySelectorAll('.buy-ticket-btn');

    // Attach click event listeners to each button
    buyTicketBtns.forEach(button => {
        button.addEventListener('click', event => {
            // Get the parent row of the clicked button
            const row = event.target.closest('tr');
            console.log(row);
        
            // Get ID to send to the ticket page
            const tripId = row.getAttribute('data-id');
        
            // Redirect to the next page with the data in the query string
            // get current url
            var currentUrl = window.location.href;
            // remove last part word after /
            currentUrl = currentUrl.substring(0, currentUrl.lastIndexOf("/"));

            window.location.href = currentUrl + `/passengerticket?tripid=${tripId}`;
        });
    }
    );
});

//deleting
document.addEventListener(
    "DOMContentLoaded", function(){
        const deleteBtn = document.getElementById("delete-button");
        deleteBtn.addEventListener("click", function(e){
            deleteRow(e);
        });

        function deleteRow(e){
            let row = e.
        }


    }
);