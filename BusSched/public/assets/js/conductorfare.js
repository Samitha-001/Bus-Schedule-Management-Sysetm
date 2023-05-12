document.addEventListener("DOMContentLoaded", function () {
    
    // bus fare
    // get div withclass fare-from-to-grid
    var fareFromToGrid = document.getElementsByClassName("fare-from-to-grid")[0];
    // console.log(fareFromToGrid);
    let busfareTable = document.getElementById("busfare-table");
    
    inputs = fareFromToGrid.getElementsByTagName("input");
    let farefromInput = inputs[0];
    let faretoInput = inputs[1];
    let calculateFareButton = document.getElementById("calculate-fare");

    let fareResultDiv = document.getElementById("fare-result");

    calculateFareButton.addEventListener("click", displayFare);

    function displayFare() {
        const farefrom = farefromInput.value;
        const fareto = faretoInput.value;
        let tds = busfareTable.getElementsByClassName("fare-td");
        for (let i = 0; i < tds.length; i++) {
            tds[i].style.backgroundColor = "white";
        }
        // find tr with data-haltfrom equal to farefrom
        let tr = busfareTable.querySelector(`tr[data-haltfrom="${farefrom}"]`);
        let td = tr.querySelector(`td[data-haltto="${fareto}"]`);
        
        if (!td) {
            tr = busfareTable.querySelector(`tr[data-haltfrom="${fareto}"]`);
            td = tr.querySelector(`td[data-haltto="${farefrom}"]`);
        }

        td.style.backgroundColor = "#f4511e";
        
        fareResultDiv.textContent = "Fare from "+farefrom+" to "+fareto+": " + td.textContent + " LKR";
    }

    // add event listener to busfareTable
    busfareTable.addEventListener("click", function (e) {
        // get target
        let tds = busfareTable.getElementsByClassName("fare-td");
        for (let i = 0; i < tds.length; i++) {
            tds[i].style.backgroundColor = "white";
        }
        let target = e.target;
        // if target is a td
        if (target.className == "fare-td") {
            // get parent tr
            let td = target;
            // change color of td to orange
            td.style.backgroundColor = "#f4511e";
        }
        // get parent element of target
        let tr = target.parentElement;
        // get data-farefrom
        let farefrom = tr.dataset.haltfrom;
        let fareto = target.dataset.haltto;
        if (target.className == "fare-td") {
            fareResultDiv.textContent = "Fare from " + farefrom + " to " + fareto + ": " + target.textContent + " LKR";
            // change value on farefrom input tp farefrom
            farefromInput.value = farefrom;
            faretoInput.value = fareto;
        }

    });
});

