document.addEventListener("DOMContentLoaded", function () {
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
        
        // redirect to passengerschedule page
        window.location.href = url;
    });
});