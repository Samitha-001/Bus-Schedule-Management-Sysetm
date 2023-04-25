document.addEventListener("DOMContentLoaded", function () {
  let editbtn = document.getElementById("edit-passenger-info");

  editbtn.addEventListener("click", function (e) {
    editRow(e);
  });

  // save passenger info edit
  let savebtn = document.getElementById("save-passenger-info");
  // event listener to save button
  savebtn.addEventListener("click", function (e) {
    e.preventDefault();
    saveRow(e);
  });

  // cancel passenger info edit
  let cancelbtn = document.getElementById("cancel-passenger-info");

  // add event listener to cancel button
  cancelbtn.addEventListener("click", function (e) {
    cancelEdit(e);
  });

  // function to autofill and display editing row
  function editRow(e) {
    let ticketdiv = e.target.parentElement.parentElement;
    let userdetails = ticketdiv.querySelectorAll("p");
    let name = userdetails[0].textContent.trim();
    let phone = userdetails[1].textContent.trim();
    let address = userdetails[2].textContent.trim();
    let dob = userdetails[3].textContent.trim();

    // get the form inside ticketdiv
    let infoform = ticketdiv.querySelector("form");

    // get element by class
    let profileinfo = ticketdiv.querySelector("div.info-grid");

    // inputs
    let inputs = infoform.querySelectorAll("input");

    inputs[0].value = name;
    inputs[1].value = phone;
    inputs[2].value = address;
    inputs[3].value = dob;

    profileinfo.style.display = "none";
    infoform.style.display = "grid";
  }

  // cancel edit
  function cancelEdit(e) {
    let infoform = e.target.parentElement.parentElement;
    infoform.style.display = "none";

    let ticketdiv = e.target.parentElement.parentElement.parentElement;
    let profileinfo = ticketdiv.querySelector(".info-grid");
    profileinfo.style.display = "grid";
  }

  // save edited info
  function saveRow(e) {
    // get div
    let ticketdiv = e.target.parentElement.parentElement.parentElement;
    let prevValues = ticketdiv.querySelectorAll("p");
    let id = document.querySelector("#username").innerHTML;
    // Hi passenger1!
    //get username from above
    id = id.substring(3, id.length - 1);
    let data = { id: id };
    let inputs = ticketdiv.querySelectorAll("input");

    // check values of inputs against previous values
    for (let i = 0; i < inputs.length; i++) {
      if (inputs[i].value !== prevValues[i].textContent.trim()) {
        data[inputs[i].name] = inputs[i].value;
      }
    }

    // check if data is not empty
    if (Object.keys(data).length !== 0) {
      // send data to server
      let url = `${ROOT}/passengerprofile/api_edit`;
      let options = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      };
      fetch(url, options)
        .then((response) => response.json())
        .then((data) => {
          // console.log(data);
          for (let i = 0; i < inputs.length; i++) {
            prevValues[i].textContent = inputs[i].value;
          }
          // hide form and show info
          let infoform = ticketdiv.querySelector("form");
          infoform.style.display = "none";
          let profileinfo = ticketdiv.querySelector(".info-grid");
          profileinfo.style.display = "grid";
          // if (data.success) {
          //     // this doesn't get called
          //     // update the values
          // } else {
          //     // alert(data.message);
          // }
        })
        .catch((err) => {
          console.log(err);
        });
    }
  }

  // GIFT POINTS
  let giftPointsDiv = document.getElementById("gift-points-div");
  let giftPointsBtn = document.getElementById("gift-points-btn");
  let cancelGiftbtn = document.getElementById("cancel-gift-btn");
  let confirmGiftbtn = document.getElementById("confirm-gift-btn");
  let pointBalanceDiv = document.getElementById("point-balance-div");

  cancelGiftbtn.addEventListener("click", function (e) {
    giftPointsDiv.style.display = "none";
    giftPointsBtn.style.display = "block";
  });

  giftPointsBtn.addEventListener("click", function (e) {
    giftPointsDiv.style.display = "block";
    giftPointsBtn.style.display = "none";
  });

  confirmGiftbtn.addEventListener("click", function (e) {
    let confirm = window.confirm("Are you sure you want to gift points?");
    if (confirm) {
      giftPointsDiv.style.display = "none";
      giftPointsBtn.style.display = "block";
      // change points
      // call function to gift points
      giftPoints();
    }
  });

  function giftPoints(e) {
    let inputs = giftPointsDiv.querySelectorAll("input");
    // option selected from select
    let select = giftPointsDiv.querySelector("select").value;
    let data = {};

    // if empty
    if (select === "") {
      alert("Please select a passenger to gift points to");
      return;
    }

    for (let i = 0; i < inputs.length; i++) {
      if (!inputs[i].value) {
        alert("Please enter points to gift");
        return;
      }
      data[inputs[i].name] = inputs[i].value;
    }
    data["points_to"] = select;
    
    // update point balance
    let vals = pointBalanceDiv.querySelectorAll("p");
    
    vals[0].textContent = parseInt(vals[0].textContent) - parseInt(data["amount"]);
    vals[1].textContent = parseInt(vals[1].textContent) - parseInt(data["amount"]) + " LKR";

    // send data to server
    let url = `${ROOT}/passengerprofile/api_gift_points`;
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
      .then((response) => response.json())
      .catch((err) => {
        console.log(err);
      })
      .then((data) => {
        // console.log(data);
      });
  }

  // update location cards
  

});