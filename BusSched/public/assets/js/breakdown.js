document.addEventListener("DOMContentLoaded", function () {
  // get breakdown-repaired-btn button
  const btn = document.getElementById("breakdown-repaired-btn");
  console.log(btn);

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
      });
  });

  // const btn = document.getElementById("btn");
  // const btn2 = document.getElementById("btn2");
  // let noBreakdown = document.getElementById("no-breakdowns-td");
  // if (noBreakdown) {
  //   btn.disabled = false;
  // } else {
  //   btn.disabled = true;
  // }


  // btn.addEventListener("click", () => {
  //   const form = document.getElementById("view_route");

  //   if (form.style.display === "none") {
  //     form.style.display = "block";
  //   } else {
  //     form.style.display = "none";
  //   }
  // });

  // btn.addEventListener("click", () => {
  //   const form = document.getElementById("view_fare");

  //   if (form.style.display === "none") {
  //     form.style.display = "block";
  //   } else {
  //     form.style.display = "none";
  //   }
  // });

  // btn.addEventListener("click", () => {
  //   const form = document.getElementById("view_registernewbus");

  //   if (form.style.display === "none") {
  //     form.style.display = "block";
  //   } else {
  //     form.style.display = "none";
  //   }
  // });


  // btn.addEventListener("click", () => {
  //   const form = document.getElementById("view_breakdown");
  //   if (form.style.display === "none") {
  //     form.style.display = "block";
  //   } else {
  //     form.style.display = "none";
  //   }
  // });


  // btn2.addEventListener("click", () => {
  //   const form = document.getElementById("view_my_breakdowns");
  //   if (form.style.display === "none") {
  //     form.style.display = "block";
  //   } else {
  //     form.style.display = "none";
  //   }
  // });

  // const btn_history = document.getElementById("btn_history");                                            
  // btn_history.addEventListener("click", () => {
  //   const table = document.getElementById("view_history_breakdowns");
  
  //   if (table.style.display === "none") {
  //     table.style.display = "block";
  //   } else {
  //     table.style.display = "none";
  //   }
  // });
  

  // function cancel() {
  //   const form = document.getElementById("view_bus");
  //   form.style.display = "none";
  // }

  // function cancel() {
  //   const form = document.getElementById("view_fare");
  //   form.style.display = "none";
  // }

  // function cancel() {
  //   const form = document.getElementById("view_breakdown");
  //   form.style.display = "none";
  // }

  // function cancel() {
  //   const form = document.getElementById("view_route");
  //   form.style.display = "none";
  // }

  // const editButton = document.getElementById('edit-breakdown-info');
  // const editFormContainer = document.getElementById('edit-form-container');
  // // const cancelButton = document.getElementById('cancel-breakdown-info');

  // editButton.addEventListener('click', () => {
  //   editFormContainer.style.display = 'block';
  // });

  // // cancelButton.addEventListener('click', () => {
  // //   editFormContainer.style.display = 'none';
  // // });

});
