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
          tds[i].style.backgroundColor = "#24315e";
      }
      // find tr with data-haltfrom equal to farefrom
      let tr = busfareTable.querySelector(`tr[data-haltfrom="${farefrom}"]`);
      let td = tr.querySelector(`td[data-haltto="${fareto}"]`);
      
      if (!td) {
          tr = busfareTable.querySelector(`tr[data-haltfrom="${fareto}"]`);
          td = tr.querySelector(`td[data-haltto="${farefrom}"]`);
      }

      td.style.backgroundColor = "#f4511e";
      
      fareResultDiv.textContent = "Fare from "+farefrom+" to "+fareto+": " + td.textContent;
  }

  // add event listener to busfareTable
  busfareTable.addEventListener("click", function (e) {
      // get target
      let tds = busfareTable.getElementsByClassName("fare-td");
      for (let i = 0; i < tds.length; i++) {
          tds[i].style.backgroundColor = "#24315e";
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
          fareResultDiv.textContent = "Fare from " + farefrom + " to " + fareto + ": " + target.textContent;
      }

  });
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

btn.addEventListener("click", () => {
  const form = document.getElementById("view_registernewbus");

  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
});

