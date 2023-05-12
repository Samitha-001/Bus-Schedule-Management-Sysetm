document.addEventListener("DOMContentLoaded", function () {
  
  
    // GET PROFILE PICTURE from form
    let profilePicForm = document.getElementById("profile-pic-form");
    let profilePicEditBtn = document.getElementById("edit-pencil");
    
    let editbtn = document.getElementById("edit-passenger-info");
  
    editbtn.addEventListener("click", function (e) {
      e.preventDefault();
      editRow(e);
    });

});