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
    document.getElementById('edit-info-form').style.display = "none";
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
    // console.log(ticketdiv);
    let prevValues = ticketdiv.querySelectorAll("p");
    
    let id = document.querySelector("#username").innerHTML;
    console.log(id);
    // get username from above
    id = id.substring(3, id.length - 1);
    
    let data = { id: id };
    
    let inputs = ticketdiv.querySelectorAll("input");
    
    // check values of inputs against previous values
    for (let i = 0; i < inputs.length; i++) {
      if (inputs[i].value !== prevValues[i]) {
        data[inputs[i].name] = inputs[i].value;
        
      }
    }
    
    // check if data is not empty
    if (Object.keys(data).length !== 0) {
      // send data to server
      let url = `${ROOT}/schedulerprofile/api_edit`;
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
          console.log(data);
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
          window.location.href = `${ROOT}/schedulerprofile`;
          
        } else {
          alert(data.message);
        }
      }
      )
  });

  

  

  

  // remove friend
  


  // function to remove a friend
  
});