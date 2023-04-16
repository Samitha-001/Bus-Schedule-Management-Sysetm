document.addEventListener("DOMContentLoaded", function () {
  const table = document.querySelector("table");
  let inputrow = document.querySelector(".dummy-input");
  let dummyrow = document.querySelector(".dummy-row");
  const addbusbtn = document.querySelector(".add-bus");

  addbusbtn.addEventListener("click", (e) => {
    // disable add button
    addbusbtn.disabled = true;

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
      addbusbtn.disabled = true;
      editRow(e);
    } else if (e.target.classList.contains("cancel-btn")) {
      addbusbtn.disabled = false;
      cancelEdit(e);
    } else if (e.target.classList.contains("delete-btn")) {
      deleteRow(e);
    } else if (e.target.classList.contains("add-row-btn")) {
      addbusbtn.disabled = false;
      addRow(e);
    } else if (e.target.classList.contains("cancel-add-btn")) {
      addbusbtn.disabled = false;
      cancelAdd(e);
    } else if (e.target.classList.contains("save-btn")) {
      addbusbtn.disabled = false;
      saveRow(e);
    }
  });

  function editRow(e) {
    let row = e.target.parentElement.parentElement;
    // let busid = row.getAttribute("data-id");
    let tds = row.querySelectorAll("td");
    let rowno = tds[0].textContent.trim();
    let busno = tds[1].textContent.trim();
    let type = tds[2].textContent.trim();
    let seatsno = tds[3].textContent.trim();
    let route = tds[4].textContent.trim();
    let start = tds[5].textContent.trim();
    let dest = tds[6].textContent.trim();
    let owner = tds[7].textContent.trim();
    let conductor = tds[8].textContent.trim();
    let driver = tds[9].textContent.trim();

    // clone input row and fill it with data
    let clone = inputrow.cloneNode(true);
    clone.classList.remove("dummy-input");
    let inputs = clone.querySelectorAll("input");
    clone.querySelector(".edit-options").style.display = "block";
    clone.querySelector("td").textContent = rowno;
    inputs[0].value = busno;
    inputs[1].value = type;
    inputs[2].value = seatsno;
    inputs[3].value = route;
    inputs[4].value = start;
    inputs[5].value = dest;
    inputs[6].value = owner;
    inputs[7].value = conductor;
    inputs[8].value = driver;

    row.parentElement.insertBefore(clone, row);
    row.style.display = "none";
    row.classList.add("being-edited");
  }

  function cancelAdd(e) {
    let row = e.target.parentElement.parentElement;
    row.remove();
  }

  // cancel edit
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
    let busid = row.getAttribute("data-id");

    // ask for confirmation
    let confirm = window.confirm("Are you sure you want to delete this bus?");
    if (confirm) {
      deleteRecord(busid);
      row.remove();
    }
  }

  // add row
  function addRow(e) {
    let clone = dummyrow.cloneNode(true);
    clone.classList.remove("dummy-row");

    let dummyinput = document.querySelector(".being-added");
    let inputs = dummyinput.querySelectorAll("input");
    let busno = inputs[0].value;
    let type = inputs[1].value;
    let seatsno = inputs[2].value;
    let route = inputs[3].value;
    let start = inputs[4].value;
    let dest = inputs[5].value;
    let owner = inputs[6].value;
    let conductor = inputs[7].value;
    let driver = inputs[8].value;

    // add data to dummy row
    let tds = clone.querySelectorAll("td");

    // get the row count
    let rowcount = document.querySelectorAll("tbody tr").length;
    rowno = rowcount - 2;

    tds[0].textContent = rowno;
    tds[1].textContent = busno;
    tds[2].textContent = type;
    tds[3].textContent = seatsno;
    tds[4].textContent = route;
    tds[5].textContent = start;
    tds[6].textContent = dest;
    tds[7].textContent = owner;
    tds[8].textContent = conductor;
    tds[9].textContent = driver;

    data = {};

    for (let i = 0; i < inputs.length; i++) {
      let fieldName = inputs[i].parentElement.getAttribute("data-fieldname");
      data[fieldName] = inputs[i].value;
    }

    insertRow(data);
    document.querySelector("tbody").appendChild(clone);
    dummyinput.remove();
  }

  function saveRow(e) {
    let row = e.target.parentElement.parentElement;
    let inputs = row.querySelectorAll("input");
    let busno = inputs[0].value;
    let type = inputs[1].value;
    let seatsno = inputs[2].value;
    let route = inputs[3].value;
    let start = inputs[4].value;
    let dest = inputs[5].value;
    let owner = inputs[6].value;
    let conductor = inputs[7].value;
    let driver = inputs[8].value;

    let originalrow = document.querySelector(".being-edited");
    originalrow.style.display = "table-row";

    let prevVal = originalrow.querySelectorAll("td");

    originalrow.classList.remove("being-edited");
    let busid = originalrow.getAttribute("data-id");
    let td2s = originalrow.querySelectorAll("td");

    let data = {
      id: busid
    };

    for (let i = 0; i < inputs.length; i++) {
      let fieldName = inputs[i].parentElement.getAttribute("data-fieldname");
      
      if (inputs[i].value != prevVal[i + 1].textContent.trim()) {
        data[fieldName] = inputs[i].value;
      }
    }

    console.log(data);

    update(data);
    td2s[1].textContent = busno;
    td2s[2].textContent = type;
    td2s[3].textContent = seatsno;
    td2s[4].textContent = route;
    td2s[5].textContent = start;
    td2s[6].textContent = dest;
    td2s[7].textContent = owner;
    td2s[8].textContent = conductor;
    td2s[9].textContent = driver;

    row.remove();
  }

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

  function insertRow(data) {
    fetch(`${ROOT}/adminbuses/api_add`, {
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

  function deleteRecord(id) {
    fetch(`${ROOT}/adminbuses/api_delete`, {
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
