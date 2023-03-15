document.addEventListener("DOMContentLoaded", function () {
  const table = document.querySelector("table");
  let inputrow = document.querySelector(".dummy-input");
  // let dummyrow = document.querySelector(".dummy-row");

  // event delegation for table
  table.addEventListener("click", function (e) {
    // if clicked on img with given class
    if (e.target.classList.contains("edit-btn")) {
      editRow(e);
    } else if (e.target.classList.contains("cancel-btn")) {
      cancelEdit(e);
    } else if (e.target.classList.contains("add-row-btn")) {
      addRow(e);
    } else if (e.target.classList.contains("cancel-add-btn")) {
      cancelAdd(e);
    } else if (e.target.classList.contains("save-btn")) {
      saveRow(e);
    }
  });

  // function to autofill and display editing row
  function editRow(e) {
    let row = e.target.parentElement.parentElement;
    let tds = row.querySelectorAll("td");
    let rowno = tds[0].textContent.trim();
    let username = tds[1].textContent.trim();
    let email = tds[2].textContent.trim();
    let name = tds[3].textContent.trim();
    let phone = tds[4].textContent.trim();
    let address = tds[5].textContent.trim();
    let dob = tds[6].textContent.trim();
    let points = tds[7].textContent.trim();
    let points_expiry = tds[8].textContent.trim();

    // clone input row and fill it with data
    let clone = inputrow.cloneNode(true);
    clone.classList.remove("dummy-input");
    let inputs = clone.querySelectorAll("input");

    clone.querySelector(".edit-options").style.display = "block";
    // fill first non-editable tds
    let td2s = clone.querySelectorAll("td");
    td2s[0].textContent = rowno;
    td2s[1].textContent = username;
    td2s[2].textContent = email;

    // fill the inputs with data
    inputs[0].value = name;
    inputs[1].value = phone;
    inputs[2].value = address;
    inputs[3].value = dob;
    inputs[4].value = points;
    inputs[5].value = points_expiry;

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

  // save edited row (updated)
  function saveRow(e) {
    let row = e.target.parentElement.parentElement;
    // get data from input fields
    let tds = row.querySelectorAll("td");
    let inputs = row.querySelectorAll("input");
    
    let originalrow = document.querySelector(".being-edited");
    originalrow.style.display = "table-row";

    // check if the data is changed
    let prevVal = originalrow.querySelectorAll("td");

    originalrow.classList.remove("being-edited");
    let userid = originalrow.getAttribute("data-username");
    let td2s = originalrow.querySelectorAll("td");

    let data = {
      role: "passenger",
      username: userid,
    };

    for (let i = 0; i < inputs.length; i++) {
      let fieldName = inputs[i].parentElement.getAttribute("data-fieldname");
      
      if (inputs[i].value != prevVal[i + 3].textContent.trim()) {
        td2s[i + 3].textContent = inputs[i].value;
        data[fieldName] = inputs[i].value;
      
      }
    }
    console.log(data);
    // console.log(prevVal[4].textContent.trim());

    // console.log(data);
    update(data);
    row.remove();
  }

  function update(data) {
    fetch(`${ROOT}/adminusers/api_edit_user`, {
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

  // add class expired to expired points
  function checkPointsExpiry() {
    let tds = document.querySelectorAll("td[data-fieldname=points_expiry]");
    let today = new Date();
    tds.forEach((td) => {
      let expiry = new Date(td.textContent.trim());
      if (expiry < today) {
        td.classList.add("expired");
      }
    });
  }

  checkPointsExpiry();
});
