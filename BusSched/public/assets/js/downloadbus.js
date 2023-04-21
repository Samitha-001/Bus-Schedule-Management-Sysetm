document.getElementById('downloadBtn').addEventListener('click', function() {
    // Convert the table data to a CSV string
    let table = document.getElementById('tableData');
    let csv = [];
    let rows = table.rows;

    for (let i = 0; i < rows.length; i++) {
        let row = [];
        let cells = rows[i].cells;

        for (let j = 0; j < cells.length; j++) {
            row.push(cells[j].innerText);
        }

        csv.push(row.join(','));
    }

    // Create a hidden link element to trigger the download
    let link = document.createElement('a');
    link.href = 'download.php?data=' + encodeURIComponent(csv.join('\n'));
    link.download = 'table_data.csv';
    link.style.display = 'none';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
});