document.addEventListener("DOMContentLoaded", function () {
    let editbtn = document.getElementById("edit-passenger-info");
    // console.log(editbtn);
    let inputrow = document.querySelector(".dummy-input");
    
    editbtn.addEventListener("click", function (e) { 
        editRow(e);
    });
    
    let savebtn = document.getElementById("save-passenger-info");
    // console.log(savebtn);
    savebtn.addEventListener("click", function (e) {
        saveRow(e);
    });

    // cancel passenger info edit
    let cancelbtn = document.getElementById("cancel-passenger-info");

    console.log(cancelbtn);
    cancelbtn.addEventListener("click", function (e) {
        console.log("cancel");
        cancelEdit(e);
    });


    // function to autofill and display editing row
    function editRow(e) {
        let ticketdiv = e.target.parentElement;
        let userdetails = ticketdiv.querySelectorAll("p");
        let name = userdetails[0].textContent.trim();
        let phone = userdetails[1].textContent.trim();
        let address = userdetails[2].textContent.trim();
        let dob = userdetails[3].textContent.trim();

        // console.log(name, phone, address, dob);
        let clone = inputrow.cloneNode(true);
        clone.classList.remove("dummy-input");
        let inputs = clone.querySelectorAll("input");

        // fill the inputs with data
        inputs[0].value = name;
        inputs[1].value = phone;
        inputs[2].value = address;
        inputs[3].value = dob;

        // append data
        ticketdiv.style.display = "none";
        ticketdiv.classList.add("being-edited");
        ticketdiv.parentElement.insertBefore(clone, ticketdiv);
    }

    // cancel edit
    function cancelEdit(e) {
        let ticketdiv = e.target.parentElement;
        console.log(ticketdiv);
        ticketdiv.style.display = "block";
        ticketdiv.classList.remove("being-edited");
        ticketdiv.parentElement.removeChild(ticketdiv.nextElementSibling);
    }


    // GIFT POINTS
    let giftPointsDiv = document.getElementById("gift-points-div");
    let giftPointsBtn = document.getElementById("gift-points-btn");
    let cancelGiftbtn = document.getElementById("cancel-gift-btn");
    let confirmGiftbtn = document.getElementById("confirm-gift-btn");

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
        }
    });
    
});