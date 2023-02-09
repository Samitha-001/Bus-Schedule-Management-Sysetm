document.addEventListener("DOMContentLoaded", () => {

    let today = new Date();
    let tomorrow = new Date();
    tomorrow.setDate(today.getDate() + 1);

    document.getElementById("dateInput").min = today.toISOString().split("T")[0];
    document.getElementById("dateInput").value = today.toISOString().split("T")[0];
    document.getElementById("dateInput").max = tomorrow.toISOString().split("T")[0];

    document.getElementById("dateInput").addEventListener("change", function () {
        let selectedDate = new Date(this.value);
        document.getElementById("selectedDate").innerHTML =
            selectedDate.toDateString();
    });

    
    const radioButtons = document.querySelectorAll("input[name='payment']");
    const pointsBalance = document.getElementById("pointsBalance");
    
    for (const button of radioButtons) {
      button.addEventListener("change", function () {
        if (button.value === "points") {
          pointsBalance.style.display = "block";
        } else {
          pointsBalance.style.display = "none";
        }
      });
    }
    
});