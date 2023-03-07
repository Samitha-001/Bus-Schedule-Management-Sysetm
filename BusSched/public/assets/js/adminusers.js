document.addEventListener("DOMContentLoaded", function () {
  // EDIT FUNCTIONALITY
  // get all the edit buttons
  const editBtns = document.querySelectorAll(".edit-btn");
  const cancelBtns = document.querySelectorAll(".cancel-btn");
  const saveBtns = document.querySelectorAll(".save-btn");

  cancelBtns.forEach((cancelBtn) => {
    cancelBtn.addEventListener("click", () => {
      // get the row of the clicked edit button
      let row = cancelBtn.parentNode.parentNode;
      let id = row.dataset.busid;

      // hide save-cancel td
      let saveCancelTd = cancelBtn.parentNode;
      saveCancelTd.style.display = "none";

      // show edit-delete td
      let editDeleteTd = cancelBtn.parentNode.previousElementSibling;
      editDeleteTd.style.display = "inline-block";

      // remove inputs and set text back to original
      const busnoCell = row.cells[2];
      const descriptionCell = row.cells[3];
      const repairtimeCell = row.cells[4];

      busnoCell.innerHTML = busnoCell.getAttribute("prev-val");
      descriptionCell.innerHTML = descriptionCell.getAttribute("prev-val");
      repairtimeCell.innerHTML = repairtimeCell.getAttribute("prev-val");
    });
  });

  // loop through the edit buttons and add a click event listener
  editBtns.forEach((editBtn) => {
    editBtn.addEventListener("click", () => {
      // get the row of the clicked edit button
      let row = editBtn.parentNode.parentNode;

      // get the cells
      const busnoCell = row.cells[2];
      const descriptionCell = row.cells[3];
      const repairtimeCell = row.cells[4];

      // create editable fields for the cells
      const busnoInput = document.createElement("input");
      busnoInput.type = "text";
      busnoInput.value = busnoCell.textContent;
      busnoCell.setAttribute("prev-val", `${busnoCell.textContent}`);

      const repairtimeInput = document.createElement("input");
      repairtimeInput.type = "text";
      repairtimeInput.value = repairtimeCell.textContent;
      repairtimeCell.setAttribute("prev-val", `${repairtimeCell.textContent}`);

      const descriptionInput = document.createElement("input");
      descriptionInput.type = "text";
      descriptionInput.value = descriptionCell.textContent;
      descriptionCell.setAttribute(
        "prev-val",
        `${descriptionCell.textContent}`
      );

      // replace the cells with the editable fields
      busnoCell.innerHTML = "";
      busnoCell.appendChild(busnoInput);

      repairtimeCell.innerHTML = "";
      repairtimeCell.appendChild(repairtimeInput);

      descriptionCell.innerHTML = "";
      descriptionCell.appendChild(descriptionInput);

      // hide edit-delete td
      let editDeleteTd = editBtn.parentNode;
      editDeleteTd.style.display = "none";

      // show save-cancel td
      let saveCancelTd = editBtn.parentNode.nextElementSibling;
      saveCancelTd.style.display = "inline-block";
    });
  });

  // loop through the save buttons and add a click event listener
  saveBtns.forEach((saveBtn) => {
    saveBtn.addEventListener("click", () => {
      // get the row of the clicked edit button
      let row = saveBtn.parentNode.parentNode;
      let id = row.dataset.busid;
  
      // get the cells
      const busnoCell = row.cells[2];
      const descriptionCell = row.cells[3];
      const repairtimeCell = row.cells[4];
  
      // get the values from the editable fields
      const busno = busnoCell.children[0].value;
      const description = descriptionCell.children[0].value;
      const repairtime = repairtimeCell.children[0].value;
  
      // send the data to the server
      fetch(`/admin/repairs/${id}`, {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          bus_no: busno,
          description: description,
          repair_time: repairtime,
        }),
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status === "success") {
            // hide save-cancel td
            let saveCancelTd = saveBtn.parentNode;
            saveCancelTd.style.display = "none";
  
            // show edit-delete td
            let editDeleteTd = saveBtn.parentNode.previousElementSibling;
            editDeleteTd.style.display = "inline-block";
  
            // set the text of the cells to the new values
            busnoCell.innerHTML = busno;
            descriptionCell.innerHTML = description;
            repairtimeCell.innerHTML = repairtime;
          }
        });
    });
  });

  // function to send ajax request to server
  function update(data) {
    fetch(`${ROOT}/adminusers/api_edit`, {
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
      console.log(data);
    });
  }

  // function to save inputs
  function saveInputs(row) {
    // get the cells
    const busnoCell = row.cells[1];
    const descriptionCell = row.cells[2];
    const repairtimeCell = row.cells[3];

    // get the values of the inputs
    const busno = busnoCell.children[0].value;
    const description = descriptionCell.children[0].value;
    const repairtime = repairtimeCell.children[0].value;

    // replace the inputs with the text
    busnoCell.innerHTML = busno;
    descriptionCell.innerHTML = description;
    repairtimeCell.innerHTML = repairtime;

    // hide save-cancel td
    let saveCancelTd = (row.querySelector("#save-cancel").style.display =
      "none");

    // show edit-delete td
    let editDeleteTd = (row.querySelector("#edit-delete").style.display =
      "inline-block");
  }
});