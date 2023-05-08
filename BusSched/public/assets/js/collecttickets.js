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
      if (e.target.classList.contains("collect-btn")) {
        addbusbtn.disabled = true;
        editRow(e);
      } else if (e.target.classList.contains("cancel-btn")) {
        addbusbtn.disabled = false;
        cancelEdit(e);
      } 
    });
})