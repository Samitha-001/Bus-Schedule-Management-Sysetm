document.addEventListener("DOMContentLoaded", function () {
  // EDIT FUNCTIONALITY
  // get all the edit buttons
  const editBtns = document.querySelectorAll(".edit-btn");

  // loop through the edit buttons and add a click event listener
  editBtns.forEach((editBtn) => {
    editBtn.addEventListener("click", () => {
      // get the row of the clicked edit button
      const row = editBtn.parentNode.parentNode;

      // get the cells
      const busnoCell = row.cells[1];
      const descriptionCell = row.cells[2];
      const repairtimeCell = row.cells[3];

      const saveCell = row.cells[4];

      // create editable fields for the cells
      const busnoInput = document.createElement("input");
      busnoInput.type = "text";
      busnoInput.value = busnoCell.textContent;

      const repairtimeInput = document.createElement("input");
      repairtimeInput.type = "text";
      repairtimeInput.value = repairtimeCell.textContent;

      const descriptionInput = document.createElement("input");
      descriptionInput.type = "text";
      descriptionInput.value = descriptionCell.textContent;

      // replace the cells with the editable fields
      busnoCell.innerHTML = "";
      busnoCell.appendChild(busnoInput);

      repairtimeCell.innerHTML = "";
      repairtimeCell.appendChild(repairtimeInput);

      descriptionCell.innerHTML = "";
      descriptionCell.appendChild(descriptionInput);

      saveCell.innerHTML = "";
      saveCell.innerHTML = "<button onclick='saveEdit()'>Save</button>";
      // add cancel button
      saveCell.innerHTML += "<button onclick='cancelEdit()'>Cancel</button>";
    });
  });
});
