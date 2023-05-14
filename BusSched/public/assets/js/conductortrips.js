document.addEventListener("DOMContentLoaded", function () {
    // upcoming trips div
    let upcomingTrips = document.querySelector("#upcoming-trips");

    // get #ongoing-trips
    let ongoingTrips = document.querySelector("#ongoing-trips");
    // get data-ongoing-trip attribute
    let ongoingTrip = ongoingTrips.getAttribute("data-ongoing-trip");

    // if there is an ongoing trip
    if (ongoingTrip == 'no') {
        // add event listener to each row trof upcoming trips
        upcomingTrips.querySelectorAll(".trip-row").forEach(function (row) {
                row.addEventListener("click", function () {
                    // if a row has a button, remove it
                    if (row.querySelector("button")) {
                        row.querySelector("button").remove();
                        // remove th with id start-trip-th
                        row.parentElement.querySelector("#start-trip-th").remove();
                    } else {
                        // remove button from all rows
                        upcomingTrips.querySelectorAll(".trip-row button").forEach(function (button) {
                            button.remove();
                        });

                        // create button
                        let button = document.createElement("button");
                        button.classList.add("button-green");
                        button.innerHTML = "Start trip";

                        // add data-trip-id attribute to the button
                        let tripId = row.getAttribute("data-trip-id");
                        button.setAttribute("data-trip-id", tripId);

                        // add data-starting-halt attribute to the button
                        let startingHalt = row.getAttribute("data-starting-halt");
                        button.setAttribute("data-starting-halt", startingHalt);

                        // add button to the beginning of the row
                        row.prepend(button);
                        // add a th to the first row of the table
                        let th = document.createElement("th");
                        // add id to the th
                        th.setAttribute("id", "start-trip-th");
                        // parent of the row
                        let parent = row.parentElement;
                        // add th to the first row of the table
                        parent.querySelector("tr").prepend(th);

                        // add event listener to button
                        button.addEventListener("click", function () {
                            // get trip id
                            let tripId = button.getAttribute("data-trip-id");
                            let startingHalt = button.getAttribute("data-starting-halt");

                            //remove the row and add it to ongoing trips
                            new Toast("fa-solid fa-check-circle", "#4CAF50", "Success", "Trip Started", false, 5000);
                            //
                            let data = {
                                trip_id: tripId,
                                starting_halt: startingHalt,
                            };

                            console.log(data);

                            // send data to server
                            let url = `${ROOT}/conductortrips/api_start_trip`;
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
                                    console.log(data);
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1000);
                                });
                        });
                    }
                });
            }
        );
    }
    ;

});