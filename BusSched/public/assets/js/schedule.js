document.addEventListener("DOMContentLoaded", function () {
    // Get the input elements
    const fromInput = document.getElementById('from');
    const toInput = document.getElementById('to');

    // Get the data rows
    const rows = document.querySelectorAll('.data-row');

    // Add an event listener to the input fields
    fromInput.addEventListener('input', filterRows);
    toInput.addEventListener('input', filterRows);

    function filterRows() {
        // Get the input values
        const fromValue = fromInput.value.toLowerCase();
        const toValue = toInput.value.toLowerCase();
        
        console.log(fromValue);
        console.log(toValue);

        // Filter the rows
        const filteredRows = [];
        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const value = row.querySelector('[data-fieldname="starting_halt"]').textContent.toLowerCase();
            console.log(value);
            if (value.includes(fromValue)) {
                filteredRows.push(row);
            }
        }

        // Update the view to show only the filtered rows
        rows.forEach(row => row.style.display = 'none');
        filteredRows.forEach(row => row.style.display = 'table-row');
        }

});