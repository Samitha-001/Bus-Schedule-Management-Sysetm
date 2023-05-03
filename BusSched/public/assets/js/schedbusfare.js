document.addEventListener("DOMContentLoaded", function () {
    const table = document.querySelector("table");
    let inputrow = document.querySelector(".dummy-input");
  let dummyrow = document.querySelector(".dummy-row");
  const addfarebtn = document.querySelector(".add-btn");
    
    // del.addEventListener("click", function(e){
    //     console.log("Hey");
    // });

    addfarebtn.addEventListener("click", (e) => {
        // disable add button
        console.log("H");
        addfarebtn.disabled = true;
    
        let irow = inputrow.cloneNode(true);
        irow.classList.remove("dummy-input");
        irow.querySelector(".add-options").style.display = "block";
        irow.classList.add("being-added");
        document.querySelector("tbody").prepend(irow);
      });


  // event delegation for table
  table.addEventListener("click", function (e) {
    // if clicked on img with given class
    if (e.target.classList.contains("delete-btn")) {
      deleteRow(e);
    }else if (e.target.classList.contains("add-row-btn")) {
        addfarebtn.disabled = false;
        addRow(e);
    }else if (e.target.classList.contains("cancel-btn")) {
        addfarebtn.disabled = false;
        cancelAdd(e);
    }else if (e.target.classList.contains("save-btn")) {
        addbusbtn.disabled = false;
        saveRow(e);
      }
  });

  function cancelAdd(e) {
    let row = e.target.parentElement.parentElement;
    row.remove();
  }

  // add row
  function addRow(e) {
    let clone = dummyrow.cloneNode(true);
    clone.classList.remove("dummy-row");

    let dummyinput = document.querySelector(".being-added");
    let inputs = dummyinput.querySelectorAll("input");
    let from = inputs[0].value;
    let to = inputs[1].value;
    let route = inputs[2].value;
    let amount = inputs[3].value;
    let last_updated = inputs[4].value;
    // let dest = inputs[5].value;
    // let owner = inputs[6].value;
    // let conductor = inputs[7].value;
    // let driver = inputs[8].value;

    // add data to dummy row
    let tds = clone.querySelectorAll("td");

    // get the row count
    let rowcount = document.querySelectorAll("tbody tr").length;
    rowno = rowcount - 2;

    tds[0].textContent = rowno;
    tds[1].textContent = from;
    tds[2].textContent = to;
    tds[3].textContent = route;
    tds[4].textContent = amount;
    tds[5].textContent = last_updated;
    
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

  function insertRow(data) {
    const ROOT =  'http://localhost/Bus-Schedule-Management-System/bussched/public'; 

    fetch(`${ROOT}/schedfares/api_add`, {
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
    
  
    // delete row
    function deleteRow(e) {
      let row = e.target.parentElement.parentElement;
      let fareid = row.getAttribute("data-id");
      // ask confirmation from user
      let confirm = window.confirm("Are you sure you want to delete this ?");
      if (confirm) {
        deleteRecord(fareid);
        row.remove();
      }
    }
  
  
    // function to delete row from database
    function deleteRecord(id) {
        const ROOT =  'http://localhost/Bus-Schedule-Management-System/bussched/public'; 
      fetch(`${ROOT}/schedfares/api_delete`, {
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
  