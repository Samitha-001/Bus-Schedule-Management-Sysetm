document.addEventListener("DOMContentLoaded", function () {
  // EDIT FUNCTIONALITY
  // get all the edit buttons
  const editBtns = document.querySelectorAll(".edit-btn");

  // loop through the edit buttons and add a click event listener
  editBtns.forEach((editBtn) => {
    editBtn.addEventListener("click", () => {
      // get the row of the clicked edit button
      const row = editBtn.parentNode.parentNode;

      // get the name and email cells
      const usernameCell = row.cells[2];
      const emailCell = row.cells[3];
      const roleCell = row.cells[4];

      // create editable fields for the name and email cells
      const usernameInput = document.createElement("input");
      usernameInput.type = "text";
      usernameInput.value = usernameCell.textContent;

      const emailInput = document.createElement("input");
      emailInput.type = "email";
      emailInput.value = emailCell.textContent;

      const roleInput = document.createElement("input");
      roleInput.type = "text";
      roleInput.value = roleCell.textContent;

      // replace the cells with the editable fields
      usernameCell.innerHTML = "";
      usernameCell.appendChild(usernameInput);

      emailCell.innerHTML = "";
      emailCell.appendChild(emailInput);

      roleCell.innerHTML = "";
      roleCell.appendChild(roleInput);
    });
  });

  function saveRecord() {
    // Get the input values from the editable record
    var username = document.getElementById("edit-username").value;
    var email = document.getElementById("edit-email").value;
    var role = document.getElementById("edit-role").value;
  
    // Update the table row with the new values
    var tableRow = document.getElementById("table-row-editable");
    tableRow.cells[2].innerHTML = username;
    tableRow.cells[3].innerHTML = email;
    tableRow.cells[4].innerHTML = role;
  
    // Hide the input fields and show the original row values
    tableRow.classList.remove("editable");
  }
});
