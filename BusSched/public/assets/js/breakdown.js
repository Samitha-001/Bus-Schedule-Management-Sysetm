document.addEventListener("DOMContentLoaded", function () {

  // get breakdown-repaired-btn button
  const btn = document.getElementById("breakdown-repaired-btn");

  // if button exists
  if (btn) {
    // add event listener to button
    btn.addEventListener("click", () => {
      // get breakdown id
      const breakdownId = btn.getAttribute("data-breakdown-id");
      
      let data = {
        breakdownID: breakdownId,
      };

      // send data to the api
      let url = `${ROOT}/conductorbreakdowns/api_repair_breakdown`;
      let options = {
        method: "POST",
        credentials: "same-origin",
        mode: "same-origin",
        headers: {
          "Content-Type": "application/json;charset=utf-8",
        },
        body: JSON.stringify(data),
      };

      fetch(url, options)
        .then((res) => res.json())
        .catch((error) => {
          console.log(error);
        })
        .then((data) => {
          console.log(data);
          window.location.reload();
        });
    });
  }


  // get breakdown-edit-btn button
  const editBtn = document.getElementById("breakdown-edit-btn");
  const saveBtn = document.getElementById("breakdown-save-btn");
  const cancelBtn = document.getElementById("breakdown-cancel-btn");
  
  // if button exists
  if (editBtn) {
    // add event listener
    editBtn.addEventListener("click", () => {
      // console.log(editBtn);
      // get #repair-time input
      const repairTimeInput = document.getElementById("repair-time");
      repairTimeInput.disabled = false;

      saveBtn.style.display = "inline-block";
      cancelBtn.style.display = "inline-block";
      btn.style.display = "none";
      editBtn.style.display = "none";

    });
  }

  // if cancel button exists
  if (cancelBtn) {
    // add event listener
    cancelBtn.addEventListener("click", () => {
      // get #repair-time input
      const repairTimeInput = document.getElementById("repair-time");
      repairTimeInput.disabled = true;

      saveBtn.style.display = "none";
      cancelBtn.style.display = "none";
      btn.style.display = "inline-block";
      editBtn.style.display = "inline-block";
    });
  }


  // if save button exists
  if (saveBtn) {
    // get submit edit button
    const submitEditBtn = document.getElementById("submit-edit-btn");
    // add event listener
    saveBtn.addEventListener("click", (e) => {
      // click the submit button
      submitEditBtn.click();
    });

  }
});
