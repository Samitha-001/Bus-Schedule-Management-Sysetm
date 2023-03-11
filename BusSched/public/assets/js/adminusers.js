document.addEventListener("DOMContentLoaded", function () {
  const table = document.querySelector("table");
  let inputrow = document.querySelector(".dummy-input");
  let dummyrow = document.querySelector(".dummy-row");
  const adduserbtn = document.querySelector(".add-user");
  
  adduserbtn.addEventListener("click", (e) => {
    // disable add button
    adduserbtn.disabled = true;

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
      adduserbtn.disabled = true;
      editRow(e);
    } else if (e.target.classList.contains("cancel-btn")) {
      adduserbtn.disabled = false;
      cancelEdit(e);
    } else if (e.target.classList.contains("delete-btn")) {
      deleteRow(e);
    } else if (e.target.classList.contains("add-row-btn")) {
      adduserbtn.disabled = false;
      addRow(e);
    } else if (e.target.classList.contains("cancel-add-btn")) {
      adduserbtn.disabled = false;
      cancelAdd(e);
    } else if (e.target.classList.contains("save-btn")) {
      adduserbtn.disabled = false;
      saveRow(e);
    }
  });

  function editRow(e) {
    let row = e.target.parentElement.parentElement;
    let userid = row.getAttribute("data-id");
    let tds = row.querySelectorAll("td");
    let rowno = tds[0].textContent.trim();
    let username = tds[2].textContent.trim();
    let email = tds[3].textContent.trim();
    let role = tds[4].textContent.trim();

    // clone input row and fill it with data
    let clone = inputrow.cloneNode(true);
    clone.classList.remove("dummy-input");
    let inputs = clone.querySelectorAll("input");
    let select = clone.querySelector("select");

    clone.querySelector(".edit-options").style.display = "block";
    clone.querySelector("td").textContent = rowno;

    // fill the inputs with data
    inputs[0].value = username;
    inputs[1].value = email;
    select.value = role;

    // append right before the row
    row.parentElement.insertBefore(clone, row);
    // hide the row
    row.style.display = "none";
    row.classList.add("being-edited");
  }

  function cancelAdd(e) {
    let row = e.target.parentElement.parentElement;
    row.remove();
  }

  function cancelEdit(e) {
    let row = e.target.parentElement.parentElement;
    row.remove();
    let oldrow = document.querySelector(".being-edited");
    oldrow.style.display = "table-row";
    oldrow.classList.remove("being-edited");
  }

  function deleteRow(e) {
    let row = e.target.parentElement.parentElement;
    // get value of td with fieldname id
    let userid = row.querySelector("td[data-fieldname='id']").textContent;

    // get id of the row
    // let userid = row.getAttribute("data-id");
    // ask confirmation from user
    let confirm = window.confirm("Are you sure you want to delete this user?");
    if (confirm) {
      deleteRecord(userid);
      row.remove();
    }
  }

  function addRow(e) {
    let clone = dummyrow.cloneNode(true);
    clone.classList.remove("dummy-row");

    // get data from input fields
    let dummyinput = document.querySelector(".being-added");
    let inputs = dummyinput.querySelectorAll("input");
    let select = dummyinput.querySelector("select");
    let username = inputs[0].value;
    let email = inputs[1].value;
    let role = select.value;

    // fill data in dummy row
    let tds = clone.querySelectorAll("td");

    // get the number of rows in the table
    let rowcount = document.querySelectorAll("tbody tr").length;
    rowno = rowcount - 2;

    tds[0].textContent = rowno;
    tds[2].textContent = username;
    tds[3].textContent = email;
    tds[4].textContent = role;

    data = {};

    for (let i = 0; i < inputs.length; i++) {
      let fieldName = inputs[i].parentElement.getAttribute("data-fieldname");
      data[fieldName] = inputs[i].value;
    }
    data["role"] = select.value;
    data["password"] = username + "1234";

    insertRow(data);
    // append at the end
    document.querySelector("tbody").appendChild(clone);
    dummyinput.remove();
  }

  function saveRow(e) {
    let row = e.target.parentElement.parentElement;
    // get data from input fields
    let inputs = row.querySelectorAll("input");
    let select = row.querySelector("select");
    let username = inputs[0].value;
    let email = inputs[1].value;
    let role = select.value;

    let originalrow = document.querySelector(".being-edited");
    originalrow.style.display = "table-row";

    // check if the data is changed
    let prevVal = originalrow.querySelectorAll("td");

    originalrow.classList.remove("being-edited");
    let userid = originalrow.getAttribute("data-id");
    let td2s = originalrow.querySelectorAll("td");

    let data = {
      id: userid
    };

    for (let i = 0; i < inputs.length; i++) {
      let fieldName = inputs[i].parentElement.getAttribute("data-fieldname");
      data[fieldName] = inputs[i].value;

      if (inputs[i].value != prevVal[i + 2].textContent.trim()) {
        td2s[i + 2].textContent = inputs[i].value;
      }
    }
    data["role"] = select.value;
    if (select.value != prevVal[5].textContent.trim()) {
      td2s[5].textContent = select.value;
    }

    update(data);
    td2s[2] = username;
    td2s[3] = email;
    td2s[4] = role;
    row.remove();
  }

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

  function insertRow(data) {
    fetch(`${ROOT}/adminusers/api_add`, {
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
    fetch(`${ROOT}/adminusers/api_delete`, {
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