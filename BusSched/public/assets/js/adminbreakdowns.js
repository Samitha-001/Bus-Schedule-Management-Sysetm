document.addEventListener("DOMContentLoaded", function () {
  const table = document.querySelector("table");
  let inputrow = document.querySelector(".dummy-input");
  let dummyrow = document.querySelector(".dummy-row");
  const addbreakdownbtn = document.querySelector(".add-breakdown");

  addbreakdownbtn.addEventListener("click", (e) => {
    // disable add button
    addbreakdownbtn.disabled = true;

    let irow = inputrow.cloneNode(true);
    irow.classList.remove("dummy-input");
    irow.querySelector(".add-options").style.display = "block";
    irow.classList.add("being-added");
    document.querySelector("tbody").prepend(irow);
  });

  // event delegation for table
  table.addEventListener("click", function (e) {
    // if clicked on img with given class
    if (e.target.classList.contains("edit-btn")) {
      addbreakdownbtn.disabled = true;
      editRow(e);
    } else if (e.target.classList.contains("cancel-btn")) {
      addbreakdownbtn.disabled = false;
      cancelEdit(e);
    } else if (e.target.classList.contains("delete-btn")) {
      deleteRow(e);
    } else if (e.target.classList.contains("add-row-btn")) {
      addbreakdownbtn.disabled = false;
      addRow(e);
    } else if (e.target.classList.contains("cancel-add-btn")) {
      addbreakdownbtn.disabled = false;
      cancelAdd(e);
    } else if (e.target.classList.contains("save-btn")) {
      addbreakdownbtn.disabled = false;
      saveRow(e);
    }
  });

  function editRow(e) {
    let row = e.target.parentElement.parentElement;
    // let breakdownid = row.getAttribute("data-id");
    let tds = row.querySelectorAll("td");
    let rowno = tds[0].textContent.trim();
    let busno = tds[1].textContent.trim();
    let description = tds[2].textContent.trim();
    let repairtime = tds[3].textContent.trim();

    // clone input row and fill it with data
    let clone = inputrow.cloneNode(true);
    clone.classList.remove("dummy-input");
    let inputs = clone.querySelectorAll("input");
    clone.querySelector(".edit-options").style.display = "block";
    clone.querySelector("td").textContent = rowno;
    inputs[0].value = busno;
    inputs[1].value = description;
    inputs[2].value = repairtime;

    // append right before the row
    row.parentElement.insertBefore(clone, row);
    // hide the row
    row.style.display = "none";
    row.classList.add("being-edited");
  }

  // cancel adding new breakdown
  function cancelAdd(e) {
    let row = e.target.parentElement.parentElement;
    row.remove();
  }

  // cancel editing
  function cancelEdit(e) {
    let row = e.target.parentElement.parentElement;
    row.remove();
    let oldrow = document.querySelector(".being-edited");
    oldrow.style.display = "table-row";
    oldrow.classList.remove("being-edited");
  }

  // delete row
  function deleteRow(e) {
    let row = e.target.parentElement.parentElement;
    let breakdownid = row.getAttribute("data-id");
    // ask confirmation from user
    let confirm = window.confirm("Are you sure you want to delete this breakdown?");
    if (confirm) {
      deleteRecord(breakdownid);
      row.remove();
    }
  }

  // add new row
  function addRow(e) {
    // clone dummy row and append it to top
    let clone = dummyrow.cloneNode(true);
    clone.classList.remove("dummy-row");

    // get values from input fields
    let dummyinput = document.querySelector(".being-added");
    let inputs = dummyinput.querySelectorAll("input");
    let busno = inputs[0].value;
    let description = inputs[1].value;
    let repairtime = inputs[2].value;

    // fill data in dummy row
    let tds = clone.querySelectorAll("td");

    // get the no of rows in the table
    let rowcount = document.querySelectorAll("tbody tr").length;
    rowno = rowcount - 2;

    tds[0].textContent = rowno;
    tds[1].textContent = busno;
    tds[2].textContent = description;
    tds[3].textContent = repairtime;

    data = {};

    for (let i = 0; i < inputs.length; i++) {
      // get the data-fieldname of the field
      let fieldName = inputs[i].parentElement.getAttribute("data-fieldname");
      data[fieldName] = inputs[i].value;
    }

    insertRow(data);
    // append at the end
    document.querySelector("tbody").appendChild(clone);
    // remove the dummy input row
    dummyinput.remove();
  }

  // save updated edited row
  function saveRow(e) {
    let row = e.target.parentElement.parentElement;
    let inputs = row.querySelectorAll("input");
    let busno = inputs[0].value;
    let description = inputs[1].value;
    let repairtime = inputs[2].value;

    let originalrow = document.querySelector(".being-edited");
    originalrow.style.display = "table-row";

    // check if new data is same as old data
    let prevVal = originalrow.querySelectorAll("td");

    originalrow.classList.remove("being-edited");
    let breakdownid = originalrow.getAttribute("data-id");
    let td2s = originalrow.querySelectorAll("td");

    let data = {
      id: breakdownid,
    };

    for (let i = 0; i < inputs.length; i++) {
      // get the data-fieldname of the field
      let fieldName = inputs[i].parentElement.getAttribute("data-fieldname");

      // check if the value is same as old value
      if (inputs[i].value != prevVal[i + 1].textContent.trim()) {
        // if not same, add it to data object
        data[fieldName] = inputs[i].value;
      }
    }

    update(data);
    td2s[1].textContent = busno;
    td2s[2].textContent = description;
    td2s[3].textContent = repairtime;

    row.remove();
  }

  // function to send ajax request to server
  function update(data) {
    fetch(`${ROOT}/adminbreakdowns/api_edit`, {
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

  // function to insert new row in database
  function insertRow(data) {
    fetch(`${ROOT}/adminbreakdowns/api_add`, {
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

  // function to delete row from database
  function deleteRecord(id) {
    fetch(`${ROOT}/adminbreakdowns/api_delete`, {
      method: "POST",
      credentials: "same-origin",
      mode: "same-origin",
      headers: {
        "Content-Type": "application/json;charset=utf-8",
      },
      body: JSON.stringify({ id: id }),
    })
      .then((res) => res.json())
      .catch((error) => console.log(error))
      .then((data) => {
        console.log(data);
      });
  }
});
