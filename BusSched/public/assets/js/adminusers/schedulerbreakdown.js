document.addEventListener("DOMContentLoaded", function () {
    const table = document.querySelector("table");
    console.log(table)
    // event delegation for table
    table.addEventListener("click", function (e) {
      // if clicked on img with given class
      alert(e);
      if (e.target.classList.contains("delete-btn")) {
        deleteRow(e);
      } 
    });
  
    
  
    // delete row
    function deleteRow(e) {
      let row = e.target.parentElement.parentElement;
        
      let breakdownid = row.getAttribute("data-id");
      // ask confirmation from user
      let confirm = window.confirm("Are you sure you want to delete this breakdown?");
      if (confirm) {
        deleteRecord(breakdownid);
        row.remove();
      }
    }
  
    // function to delete row from database
    function deleteRecord(id) {
      fetch(`${ROOT}/schedulerbreakdown/api_delete`, {
        method: "POST",
        credentials: "same-origin",
        mode: "same-origin",
        headers: {
          "Content-Type": "application/json;charset=utf-8",
        },
        body: JSON.stringify({ id: id }),
      })
        .then((res) => res.json())
        .catch((error) => console.log(error))
        .then((data) => {
          console.log(data);
        });
    }
  });
  