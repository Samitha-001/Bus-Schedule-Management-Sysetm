document.addEventListener("DOMContentLoaded", function () {
    // remove earlier inputs from URL when refreshed
    let urlParams = new URLSearchParams(window.location.search);
    let fromParam = urlParams.get('from');
    if(fromParam) fromParam = fromParam.toLowerCase();
    
    let toParam = urlParams.get('to');
    if (toParam) toParam = toParam.toLowerCase();
    
    let dateParam = urlParams.get('date');

    // If the ?from parameter is present, remove it from the URL
    if (fromParam) {
        let newUrl = window.location.href.replace(`?from=${fromParam}`, '');
        history.replaceState(null, null, newUrl);
    }
    
    // Get the input elements
    let fromInput = document.getElementById('from');
    let toInput = document.getElementById('to');
    let dateInput = document.getElementById('date');

    // Get the data rows
    let rows = document.querySelectorAll('.data-row');

    // // Add an event listener to the input fields
    // fromInput.addEventListener('input', filterRows);
    // toInput.addEventListener('input', filterRows);
    // dateInput.addEventListener('input', filterRows);

    function filterRows(from, to, date) {
        // Get the input values
        let fromValue = from.charAt(0).toUpperCase() + from.slice(1);
        let toValue = to.charAt(0).toUpperCase() + to.slice(1);
        let dateValue = date;

        // console.log(dateValue);
        
        // Filter the rows
        let filteredRows = [];
        for (let i = 0; i < rows.length; i++) {
            // let row = rows[i];
            // // [data-fieldname="starting_halt"] and [data-fieldname="destination_halt"] and [data-fieldname="date"] are the data-fieldnames of the columns in the table
            // let value = row.querySelector('[data-fieldname="starting_halt"]').textContent.toLowerCase();

            // // check is from is after to in the halt list
            // let valuefrom = row.querySelector('[data-fieldname="from"]').textContent.toLowerCase();
            // let valueto = row.querySelector('[data-fieldname="to"]').textContent.toLowerCase();

            // // let value1 = row.querySelector('[data-fieldname="destination_halt"]').textContent.toLowerCase();
            // let value2 = row.querySelector('[data-fieldname="trip_date"]').textContent;

            // // console.log(value2);

            // // let value = row.querySelector('[data-fieldname="starting_halt"]').textContent.toLowerCase();
            // // console.log(value);
            // if (value.includes(fromValue)) {
            //     // if (value1.includes(toValue)) {
            //     // if value2 is null or value 2 is equal to dateValue
            //         if (value2.includes(dateValue) || value2 == "") {
            //             filteredRows.push(row);
            //         }
            //         // filteredRows.push(row);
            //     // }
            // }

            let row = rows[i];
            // get starting halt from row
            let startingHaltValue = row.querySelector('[data-fieldname="starting_halt"]').textContent.toLowerCase();
            startingHaltValue = startingHaltValue.charAt(0).toUpperCase() + startingHaltValue.slice(1);

            let startingTimeValue = row.querySelector('[data-fieldname="departure_time"]').textContent.toLowerCase();
            startingTimeValue = startingTimeValue.charAt(0).toUpperCase() + startingTimeValue.slice(1);

            row.querySelector('[data-fieldname="from"]').innerHTML = fromValue;
            row.querySelector('[data-fieldname="to"]').innerHTML = toValue;

            getEstimatedTime(row, startingHaltValue, fromValue, toValue, startingTimeValue);
        }


        // Update the view to show only the filtered rows
        // rows.forEach(row => row.style.display = 'none');
        // filteredRows.forEach(row => row.style.display = 'table-row');

        
    }

    // if url has from, to and date parameters    
    if (fromParam && toParam && dateParam) {
        filterRows(fromParam, toParam, dateParam);
    }

    
    // redirect to buy ticket
    let buyTicketBtns = document.querySelectorAll('.buy-ticket-btn');
    // Attach click event listeners to each button
    buyTicketBtns.forEach(button => {
        button.addEventListener('click', event => {
            // Get the parent row of the clicked button
            let row = event.target.closest('tr');
            console.log(row);
        
            // Get ID to send to the ticket page
            let tripId = row.getAttribute('data-id');
        
            // Redirect to the next page with the data in the query string
            // get current url
            var currentUrl = window.location.href;
            // remove last part word after /
            currentUrl = currentUrl.substring(0, currentUrl.lastIndexOf("/"));

            window.location.href = currentUrl + `/passengerticket?tripid=${tripId}`;
        });
    }
    );

    // when the find button is clicked
    document.querySelector("#find-trip-btn").addEventListener("click", () => {
        // get input values
        let from = document.getElementById("from").value.toLowerCase();
        let to = document.getElementById("to").value.toLowerCase();
        let date = document.getElementById("date").value;

        // filter based on from, to and date
        filterRows(from, to, date);

    });

    // function to get estimated time from server, send to api
    function getEstimatedTime(row, starting_halt, from, to, starting_time) {
        let data = {
            starting_halt: starting_halt,
            starting_time: starting_time,
            from: from,
            to: to
        };
        
        fetch(`${ROOT}/passengerschedule/api_get_estimated_time`, {
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
                row.querySelector('[data-fieldname="estimated_time_from"]').innerHTML = data.data.departure_time;
                row.querySelector('[data-fieldname="estimated_time_to"]').innerHTML = data.data.arrival_time;

              console.log(data);
            });
    }
});