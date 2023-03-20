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

    calculateFareButton.addEventListener("click", displayFare);

    function displayFare() {
        const farefrom = farefromInput.value;
        const fareto = faretoInput.value;
        
        // find tr with data-haltfrom equal to farefrom
        let tr = busfareTable.querySelector(`tr[data-haltfrom="${farefrom}"]`);
        let td = tr.querySelector(`td[data-haltto="${fareto}"]`);
        
        if (!td) {
            tr = busfareTable.querySelector(`tr[data-haltfrom="${fareto}"]`);
            td = tr.querySelector(`td[data-haltto="${farefrom}"]`);
        }
        
        let fareResultDiv = document.getElementById("fare-result");
        fareResultDiv.textContent = "Fare: " + td.textContent;
    }
    // find bus
    // get button with id find-bus
    var findBusButton = document.getElementById("find-bus");

    findBusButton.addEventListener("click", function () {
        // get from, to, date, passengers from inputs if they are empty set null
        var from = document.getElementById("from").value;
        var to = document.getElementById("to").value;
        var date = document.getElementById("date").value;
        var passengers = document.getElementById("passengers").value;
        
        // add them to data
        var data = {
            from: from,
            to: to,
            date: date,
            passengers: passengers
        };

        // get current url
        var currentUrl = window.location.href;

        // var to save the url
        var url = "/passengerschedule?";

        // if from is not empty
        if (from) {
            // add from to url
            url += "from=" + from;
        }
        // if to is not empty
        if (to) {
            // add to to url
            url += "&to=" + to;
        }
        // if date is not empty
        if (date) {
            // add date to url
            url += "&date=" + date;
        }
        // if passengers is not empty
        if (passengers) {
            // add passengers to url
            url += "&passengers=" + passengers;
        }
        
        // remove last part word after /
        currentUrl = currentUrl.substring(0, currentUrl.lastIndexOf("/"));
        // redirect to passengerschedule page
        window.location.href = currentUrl + url;
    });


});

