document.addEventListener("DOMContentLoaded", function () {
    
    // remove earlier inputs from URL when refreshed
    let urlParams = new URLSearchParams(window.location.search);
    
    let fromParam = urlParams.get('from');
    if (fromParam) fromParam = fromParam.toLowerCase();
    
    
    let toParam = urlParams.get('to');
    if (toParam) toParam = toParam.toLowerCase();
    
    let dateParam = urlParams.get('date');
    
    // get today's date
    let today = new Date().toISOString().substr(0, 10);
    filterRows(null, null, today);
    
    // If the ?from parameter is present, remove it from the URL
    if (fromParam) {
        let newUrl = window.location.href.replace(`?from=${fromParam}`, '');
        history.replaceState(null, null, newUrl);
    }
    // If the ?to parameter is present, remove it from the URL
    if (toParam) {
        let newUrl = window.location.href.replace(`?to=${toParam}`, '');
        history.replaceState(null, null, newUrl);
    }
    // If the ?date parameter is present, remove it from the URL
    if (dateParam) {
        let newUrl = window.location.href.replace(`?date=${dateParam}`, '');
        history.replaceState(null, null, newUrl);
    }    
    // Get the data rows
    let rows = document.querySelectorAll('.data-row');
    
    // function to filter rows of the schedule
    function filterRows(from = null, to = null, date = null) {
        let fromValue = null;
        let toValue = null;
        // Get the input values
        if (from) {
            fromValue = from.charAt(0).toUpperCase() + from.slice(1);
        }
        if (to) {
            toValue = to.charAt(0).toUpperCase() + to.slice(1);
        }

        let dateValue = date;
        // get halt list from id halt-list
        let haltList = document.getElementById('halt-list');
        let filter_start = 'Piliyandala';
        
        // if from and to are present
        if (from && to) {
            // get halt list options
            let options = Array.from(haltList.options).map(option => option.value);
            // make everything lowercase
            // options = options.map(option => option.toLowerCase());
            // get halt list items
            if (options.indexOf(fromValue) < options.indexOf(toValue)) {
                filter_start = 'Piliyandala';
            } else {
                filter_start = 'Pettah';
            }
        }

        // Filter the rows
        let filteredRows = [];
        let rows = document.querySelectorAll('.data-row');

        for (let i = 0; i < rows.length; i++) {
            let row = rows[i];
            // get starting halt from row
            let startingHaltValue = row.querySelector('[data-fieldname="starting_halt"]').textContent.toLowerCase();
            startingHaltValue = startingHaltValue.charAt(0).toUpperCase() + startingHaltValue.slice(1);

            let tripDateValue = row.querySelector('[data-fieldname="trip_date_val"]').textContent;

            let startingTimeValue = row.querySelector('[data-fieldname="departure_time"]').textContent.toLowerCase();
            startingTimeValue = startingTimeValue.charAt(0).toUpperCase() + startingTimeValue.slice(1);

            row.querySelector('[data-fieldname="from"]').innerHTML = fromValue;
            row.querySelector('[data-fieldname="to"]').innerHTML = toValue;
            // if fromvalue and tovalue are present
            if (fromValue && toValue) {
                getEstimatedTime(row, startingHaltValue, fromValue, toValue, startingTimeValue);
            }

            // if from and to are present
            if (from && to && date) {                
                // remove everything filteredRows
                if (filter_start == startingHaltValue && tripDateValue == dateValue) {
                    filteredRows.push(row);
                }
            } else
            if (date) {
                if (tripDateValue == dateValue) {
                    filteredRows.push(row);
                }
            } else {
                return;
            }
            }

        // display only filtered rows
        rows.forEach(row => {
            row.style.display = 'none';
        }
        );
        filteredRows.forEach(row => {
            row.style.display = 'table-row';
        }
        );
    }
    
    // redirect to buy ticket
    let buyTicketBtns = document.querySelectorAll('.buy-ticket-btn');
    // Attach click event listeners to each button
    buyTicketBtns.forEach(button => {
        button.addEventListener('click', event => {
            // Get the parent row of the clicked button
            let row = event.target.closest('tr');
            // console.log(row);
        
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

        filterRows(from, to, date);
        
        // reset
        let busTypeSelect = document.getElementById('bus-type');
        // select option all of bustype select
        busTypeSelect.selectedIndex = 0;
        let haltTypeSelect = document.getElementById('hour');
        haltTypeSelect.selectedIndex = 0;

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
            });
    }

    // click the document.querySelector("#find-trip-btn") button
    document.querySelector("#find-trip-btn").click();
    
    
    // CODE CHECK
    // get hour type select
    let hourTypeSelect = document.getElementById('hour');
    // get bus type select
    let busTypeSelect = document.getElementById('bus-type');


    // add event listener
    busTypeSelect.addEventListener('change', () => {
        // reset from to date inputs
        document.getElementById('from').value = '';
        document.getElementById('to').value = '';
        document.getElementById('date').value = '';
        // select option all of bustype select
        hourTypeSelect.selectedIndex = 0;

        // get selected option
        let selectedOption = busTypeSelect.options[busTypeSelect.selectedIndex].value;

        // get data rows
        let rows = document.querySelectorAll('.data-row');

        // if selected option is not all
        if (selectedOption != 'all') {
            // loop through rows
            rows.forEach(row => {
                // get bus type from row
                let busType = row.querySelector('[data-fieldname="bus_type"]').textContent;
                // if bus type is not equal to selected option
                if (busType != selectedOption) {
                    // hide row
                    row.style.display = 'none';
                } else {
                    // show row
                    row.style.display = 'table-row';
                }
            });
        } else {
            // show all rows
            rows.forEach(row => {
                row.style.display = 'table-row';
            });
        }
    });
    // add event listener to hour type
    hourTypeSelect.addEventListener('change', () => {
        // console.log("Hour type changed");
        // reset bus type select
        busTypeSelect.selectedIndex = 0;
        // reset from to date inputs
        document.getElementById('from').value = '';
        document.getElementById('to').value = '';
        document.getElementById('date').value = '';

        // get selected option
        let selectedOption = hourTypeSelect.options[hourTypeSelect.selectedIndex].value;

        // get data rows
        let rows = document.querySelectorAll('.data-row');

        // if selected option is not all
        if (selectedOption != 'all') {
            // loop through rows
            rows.forEach(row => {
                // get start time from row
                let startTime = row.querySelector('[data-fieldname="departure_time"]').textContent;
                // console.log(startTime);
                // get first two characters of start time
                startTime = startTime.substring(0, 2);
                // if start time is between 6am and 10am or 4pm and 8pm then rush hour else normal hour
                let hour = (startTime >= 6 && startTime <= 10) || (startTime >= 16 && startTime <= 20) ? 'rush' : 'normal';

                if (selectedOption == 'rush') {
                    if (hour == 'rush') {
                        row.style.display = 'table-row';
                    } else {
                        // show row
                        row.style.display = 'none';
                    }
                } else if (selectedOption == 'normal') {
                    if (hour == 'normal') {
                        row.style.display = 'table-row';
                    } else {
                        // show row
                        row.style.display = 'none';
                    }
                }
            });
        } else {
            // show all rows
            rows.forEach(row => {
                row.style.display = 'table-row';
            });
        }
    });

});


