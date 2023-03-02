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
      // console.log(row);

      // hide save-cancel td
      let saveCancelTd = cancelBtn.parentNode;
      saveCancelTd.style.display = "none";

      // show edit-delete td
      let editDeleteTd = cancelBtn.parentNode.previousElementSibling;
      editDeleteTd.style.display = "inline-block";

      // remove inputs and set text back to original
      const busnoCell = row.cells[1];
      const typeCell = row.cells[2];
      const seatsnoCell = row.cells[3];
      const availabilityCell = row.cells[4];
      const routeCell = row.cells[5];
      const startCell = row.cells[6];

      busnoCell.innerHTML = busnoCell.getAttribute("prev-val");
      typeCell.innerHTML = typeCell.getAttribute("prev-val");
      seatsnoCell.innerHTML = seatsnoCell.getAttribute("prev-val");
      availabilityCell.innerHTML = availabilityCell.getAttribute("prev-val");
      routeCell.innerHTML = routeCell.getAttribute("prev-val");
      startCell.innerHTML = startCell.getAttribute("prev-val");
    });
  });

  // loop through the edit buttons and add a click event listener
  editBtns.forEach((editBtn) => {
    editBtn.addEventListener("click", () => {
      // get the row of the clicked edit button
      let row = editBtn.parentNode.parentNode;
      // console.log(row);
      // 'id','bus_no','type','seats_no','availability','route','start'
      // get the cells
      const busnoCell = row.cells[1];
      const typeCell = row.cells[2];
      const seatsnoCell = row.cells[3];
      const availabilityCell = row.cells[4];
      const routeCell = row.cells[5];
      const startCell = row.cells[6];

      // create editable fields for the cells
      const busnoInput = document.createElement("input");
      busnoInput.type = "text";
      busnoInput.value = busnoCell.textContent;
      busnoCell.setAttribute("prev-val", `${busnoCell.textContent}`);

      // console.log(busnoInput.value);

      const typeInput = document.createElement("input");
      typeInput.type = "text";
      typeInput.value = typeCell.textContent;
      typeCell.setAttribute("prev-val", `${typeCell.textContent}`);

      // console.log(typeInput.value);

      const seatsnoInput = document.createElement("input");
      seatsnoInput.type = "number";
      seatsnoInput.min = 0;
      // oninput validity valid
      seatsnoInput.setAttribute('oninput', "validity.valid||(value='');");
      seatsnoInput.style.width = "50px";
      seatsnoInput.value = seatsnoCell.textContent;
      seatsnoCell.setAttribute("prev-val", `${seatsnoCell.textContent}`);

      // create a select option with two inputs yes and no, 1 and 0 value
      const availabilityInput = document.createElement("select");
      const yesOption = document.createElement("option");
      const noOption = document.createElement("option");
      yesOption.value = 1;
      noOption.value = 0;
      yesOption.textContent = "Yes";
      noOption.textContent = "No";
      availabilityInput.appendChild(yesOption);
      availabilityInput.appendChild(noOption);
      availabilityInput.value =
        availabilityCell.textContent.trim() == "Yes" ? 1 : 0;
      availabilityCell.setAttribute(
        "prev-val",
        `${availabilityCell.textContent}`
      );

      const routeInput = document.createElement("input");
      routeInput.type = "text";
      routeInput.value = routeCell.textContent;
      routeCell.setAttribute("prev-val", `${routeCell.textContent}`);

      const startInput = document.createElement("input");
      startInput.type = "text";
      startInput.value = startCell.textContent;
      startCell.setAttribute("prev-val", `${startCell.textContent}`);

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
      // console.log(row);

      // get the cells
      const busnoCell = row.cells[1];
      const typeCell = row.cells[2];
      const seatsnoCell = row.cells[3];
      const availabilityCell = row.cells[4];
      const routeCell = row.cells[5];
      const startCell = row.cells[6];

      // get the values of the inputs
      const busno = busnoCell.querySelector("input").value;
      const type = typeCell.querySelector("input").value;
      const seatsno = seatsnoCell.querySelector("input").value;
      const route = routeCell.querySelector("input").value;
      const start = startCell.querySelector("input").value;

      // get the id of the bus
      const id = row.dataset.busid;

      // get all input values where input value doesn't equal the previous value
      let data = {
        id: id,
      };
      for (let i = 1; i < 7; i++) {
        if (i == 4) {
          let input = row.cells[i].querySelector("select");
          let prevVal =
            row.cells[i].getAttribute("prev-val").trim() == "Yes" ? 1 : 0;
          let newVal = input.value;
          let fieldName = row.cells[i].dataset.fieldname;
          if (prevVal != newVal) {
            data[fieldName] = newVal;
          }
          continue;
        }

        let input = row.cells[i].querySelector("input");
        let prevVal = row.cells[i].getAttribute("prev-val");
        let newVal = input.value;
        let fieldName = row.cells[i].dataset.fieldname;
        if (prevVal != newVal) {
          data[fieldName] = newVal;
        }
      }
      update(data);
      // console.log(data);
      saveinputs(row);
    });
  });

  // function to send ajax request to server
  function update(data) {
    fetch(`${ROOT}/adminbuses/api_edit`, {
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

  // function to save the inputs
  function saveinputs(row) {
    // get the cells
    const busnoCell = row.cells[1];
    const typeCell = row.cells[2];
    const seatsnoCell = row.cells[3];
    const availabilityCell = row.cells[4];
    const routeCell = row.cells[5];
    const startCell = row.cells[6];

    // get the values of the inputs
    const busno = busnoCell.querySelector("input").value;
    const type = typeCell.querySelector("input").value;
    const seatsno = seatsnoCell.querySelector("input").value;
    const availability = availabilityCell.querySelector("select").value;
    const route = routeCell.querySelector("input").value;
    const start = startCell.querySelector("input").value;

    // replace the editable fields with the cells
    busnoCell.innerHTML = busno;
    typeCell.innerHTML = type;
    seatsnoCell.innerHTML = seatsno;
    availabilityCell.innerHTML = availability == 1 ? "Yes" : "No";
    routeCell.innerHTML = route;
    startCell.innerHTML = start;

    // hide save-cancel td
    let saveCancelTd = row.querySelector("#save-cancel").style.display = "none";

    // show edit-delete td
    let editDeleteTd = row.querySelector("#edit-delete").style.display = "inline-block";
  }
});
