document.addEventListener("DOMContentLoaded", function () {
  
  
  // GET PROFILE PICTURE from form
  let profilePicForm = document.getElementById("profile-pic-form");
  let profilePicEditBtn = document.getElementById("edit-pencil");
  
  let editbtn = document.getElementById("edit-passenger-info");

  editbtn.addEventListener("click", function (e) {
    e.preventDefault();
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
    e.preventDefault();
    cancelEdit(e);
  });

  // function to autofill and display editing row
  function editRow(e) {
    let ticketdiv = e.target.parentElement.parentElement;
    let userdetails = ticketdiv.querySelectorAll("p");
    let name = userdetails[0].textContent.trim();
    let phone = userdetails[1].textContent.trim();
    let address = userdetails[2].textContent.trim();
    

    // get the form inside ticketdiv
    let infoform = ticketdiv.querySelector("form");

    // get element by class
    let profileinfo = ticketdiv.querySelector("div#passenger-info-div");

    // inputs
    let inputs = infoform.querySelectorAll("input");

    inputs[0].value = name;
    inputs[1].value = phone;
    inputs[2].value = address;
   

    profileinfo.style.display = "none";
    infoform.style.display = "block";
    profilePicEditBtn.style.display = "block";
  }

  // cancel edit
  function cancelEdit(e) {
    let infoform = e.target.parentElement.parentElement;
    infoform.style.display = "none";

    let ticketdiv = e.target.parentElement.parentElement.parentElement;
    let profileinfo = ticketdiv.querySelector("#passenger-info-div");
    profileinfo.style.display = "block";
    profilePicEditBtn.style.display = "none";
  }

  // save edited info
  function saveRow(e) {
    // get div
    let ticketdiv = e.target.parentElement.parentElement.parentElement;
    let prevValues = ticketdiv.querySelectorAll("p");
    let id = document.querySelector("#username").innerHTML;
  
    // get username from above
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
          let profileinfo = ticketdiv.querySelector("#passenger-info-div");
          profileinfo.style.display = "block";
          profilePicEditBtn.style.display = "none";
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
    //check if gifting points > current value
    let g = document.querySelector('#points').value
    let c = parseFloat(pointBalanceDiv.querySelector('p').innerHTML)
    if (g>c){
      new Toast('fa fa fa-exclamation-triangle', '#ff0000','Invalid','You cannot gift more points than you have',true,3000)
      return
    }
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

  
  // let profilePicInput = document.getElementById("profile-pic-input");
  // value of input with name username
  let username = profilePicForm.querySelector("input[name='username']").value;
  let profilePicUploadBtn = document.getElementById("upload-profile-pic-btn");

  profilePicEditBtn.addEventListener("click", function (e) { 
    document.getElementById("profile-pic-from-div").style.display = "block";
  });

  profilePicUploadBtn.addEventListener("click", function (e) {
    // prevent default
    e.preventDefault();

    // hide form
    let profilePic = document.getElementById("profile-pic");
    profilePic.src = `${ROOT}/assets/images/profile-pics/${username}.jpg`;
    document.getElementById("profile-pic-from-div").style.display = "none";

    // save file in uploads folder
    let formData = new FormData(profilePicForm);
    let url = `${ROOT}/passengerprofile/api_upload_profile_pic`;
    let options = {
      method: "POST",
      body: formData,
    };
    fetch(url, options)
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // redirect to profile page
          window.location.href = `${ROOT}/passengerprofile`;
          
        } else {
          alert(data.message);
        }
      }
      )
  });

  // add friend
  let addFriendBtn = document.getElementById("add-friend-btn");
  let addFriendDiv = document.getElementById("add-friend-div");
  let cancelAddFriendBtn = document.getElementById("cancel-add-friend-btn");
  let confirmAddFriendBtn = document.getElementById("confirm-add-friend-btn");

  addFriendBtn.addEventListener("click", function (e) {
    addFriendDiv.style.display = "block";
    addFriendBtn.style.display = "none";
  });

  cancelAddFriendBtn.addEventListener("click", function (e) {
    addFriendDiv.style.display = "none";
    addFriendBtn.style.display = "block";
  });

  confirmAddFriendBtn.addEventListener("click", function (e) {
    let confirm = window.confirm("Are you sure you want to add friend?");
    if (confirm) {
      addFriendDiv.style.display = "none";
      addFriendBtn.style.display = "block";
      
      addFriend();
      // display data in friend list
      // create div
      let div = document.createElement("div");
      // add i tag inside div
      let i = document.createElement("i");
      i.innerHTML = "Remove friend";
      i.classList.add("remove-friend-i");
      // add attribute
      let input = document.getElementById("friend");

      i.setAttribute("data-friend", input.value);
      div.appendChild(i);
      let p = document.createElement("p");
      p.innerHTML = "@"+input.value;
      div.appendChild(p);
      div.appendChild(document.createElement("hr"));

      // add div to friend list
      friendListDiv.appendChild(div);
    }
  });

  

  // remove friend
  


  // function to remove a friend
  
});