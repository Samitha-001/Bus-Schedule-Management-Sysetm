document.addEventListener("DOMContentLoaded", function () {

    // get selects
    let fromSelect = document.getElementById("starting_halt");
    let dateSelect = document.getElementById("trip_date");

    let from = document.getElementById("starting_halt").value.toLowerCase();
    let date = document.getElementById("trip_date").value.toLowerCase();
    filterRows(from, date);

    // if from select is changed
    fromSelect.addEventListener("change", () => {
        // get input values
        let from = document.getElementById("starting_halt").value.toLowerCase();
        let date = document.getElementById("trip_date").value;

        filterRows(from, date);
    });

    // if date is changed
    dateSelect.addEventListener("change", () => {
        // get input values
        let from = document.getElementById("starting_halt").value.toLowerCase();
        let date = document.getElementById("trip_date").value;

        filterRows(from, date);
    });

    // function to filter rows of the schedule
    function filterRows(from = null, date = null) {
        // Get the input values
        if (from) {
            fromValue = from;
        }
        if (date) {
            dateValue = date;
        }

        // Filter the rows
        let filteredRows = [];
        let rows = document.querySelectorAll('.data-row');

        for (let i = 0; i < rows.length; i++) {
            let row = rows[i];
            // get starting halt from row
            let startingHaltValue = row.querySelector('[data-fieldname="starting_halt"]').textContent.toLowerCase();

            let tripDateValue = row.querySelector('[data-fieldname="trip_date_val"]').textContent;

            // if from and date are present
            if (from && date) {                
                // remove everything filteredRows
                if (from == startingHaltValue && tripDateValue == dateValue) {
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

});