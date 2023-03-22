document.addEventListener("DOMContentLoaded", function () {
    let editbtn = document.getElementById("edit-passenger-info");
    // console.log("editbtn");
    // console.log(editbtn);
    let inputrow = document.querySelector(".dummy-input");
    
    editbtn.addEventListener("click", function (e) { 
        editRow(e);
    });

    let savebtn = document.getElementById
    ("save-passenger-info");
    savebtn.addEventListener("click", function (e) {
        saveRow(e);
    });

    let cancelbtn = document.getElementById("cancel-passenger-info");
    // console.log("cancelbtn");
    // console.log(cancelbtn);
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


    //
    // save updated row
    // function saveRow(e) {
    //     let ticketdiv = e.target.parentElement;
    //     let inputs = ticketdiv.querySelectorAll("input");
    //     let name = inputs[0].value;
    //     let phone = inputs[1].value;
    //     let address = inputs[2].value;
    //     let dob = inputs[3].value;

    //     let userdetails = ticketdiv.previousElementSibling.querySelectorAll("p");
    //     userdetails[0].textContent = name;
    //     userdetails[1].textContent = phone;
    //     userdetails[2].textContent = address;
    //     userdetails[3].textContent = dob;

    //     ticketdiv.style.display = "block";
    //     ticketdiv.classList.remove("being-edited");
    //     ticketdiv.parentElement.removeChild(ticketdiv.nextElementSibling);
    // }
    
});