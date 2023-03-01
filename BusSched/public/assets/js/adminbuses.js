document.addEventListener("DOMContentLoaded", function () {
  // EDIT FUNCTIONALITY
  // get all the edit buttons
  const editBtns = document.querySelectorAll(".edit-btn");

  // loop through the edit buttons and add a click event listener
  editBtns.forEach((editBtn) => {
    editBtn.addEventListener("click", () => {
      // get the row of the clicked edit button
      const row = editBtn.parentNode.parentNode;

      // 'id','bus_no','type','seats_no','availability','route','start'
      // get the cells
      const busnoCell = row.cells[1];
      const typeCell = row.cells[2];
      const seatsnoCell = row.cells[3];
      const availabilityCell = row.cells[4];
      const routeCell = row.cells[5];
      const startCell = row.cells[6];

      const saveCell = row.cells[7];

      // create editable fields for the cells
      const busnoInput = document.createElement("input");
      busnoInput.type = "text";
      busnoInput.value = busnoCell.textContent;

      const typeInput = document.createElement("input");
      typeInput.type = "text";
      typeInput.value = typeCell.textContent;

      const seatsnoInput = document.createElement("input");
      seatsnoInput.type = "text";
      seatsnoInput.value = seatsnoCell.textContent;

      const availabilityInput = document.createElement("input");
      availabilityInput.type = "text";
      availabilityInput.value = availabilityCell.textContent;

      const routeInput = document.createElement("input");
      routeInput.type = "text";
      routeInput.value = routeCell.textContent;

      const startInput = document.createElement("input");
      startInput.type = "text";
      startInput.value = startCell.textContent;

      // replace the cells with the editable fields
      busnoCell.innerHTML = "";
      busnoCell.appendChild(busnoInput);

      typeCell.innerHTML = "";
      typeCell.appendChild(typeInput);

      seatsnoCell.innerHTML = "";
      seatsnoCell.appendChild(seatsnoInput);

      availabilityCell.innerHTML = "";
      availabilityCell.appendChild(availabilityInput);

      routeCell.innerHTML = "";
      routeCell.appendChild(routeInput);

      startCell.innerHTML = "";
      startCell.appendChild(startInput);

      saveCell.innerHTML = "";
      saveCell.innerHTML = "<button onclick='saveEdit()'>Save</button>";
      // add cancel button
      saveCell.innerHTML += "<button onclick='cancelEdit()'>Cancel</button>";

      // save the edit
      const saveEdit = () => {
        // get the row of the clicked edit button
        const row = editBtn.parentNode.parentNode;

        // get the cells
        const busnoCell = row.cells[1];
        const typeCell = row.cells[2];
        const seatsnoCell = row.cells[3];
        const availabilityCell = row.cells[4];
        const routeCell = row.cells[5];
        const startCell = row.cells[6];

        // get the values of the editable fields
        const busno = busnoInput.value;
        const type = typeInput.value;
        const seatsno = seatsnoInput.value;
        const availability = availabilityInput.value;
        const route = routeInput.value;
        const start = startInput.value;

        console.log(busno);
      };
      // const saveRow = row;
    });
  });
});
