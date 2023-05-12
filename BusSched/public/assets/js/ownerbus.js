 document.addEventListener("DOMContentLoaded", function () {
  
    const btn = document.getElementById("btn");



    btn.addEventListener("click", () => {
        const form = document.getElementById("view_breakdown");
      
        if (form.style.display === "none") {
          form.style.display = "block";
        } else {
          form.style.display = "none";
        }
      });
    
    
    
    //   btn.addEventListener("click", () => {
    //     const form = document.getElementById("view_registernewbus");
      
    //     if (form.style.display === "none") {
    //       form.style.display = "block";
    //     } else {
    //       form.style.display = "none";
    //     }
    //   });
      
      
    
      const my_history = document.getElementById("my_history");
      my_history.addEventListener("click", () => {
        const table = document.getElementById("view_history_breakdowns");
      
        if (table.style.display === "none") {
            table.style.display = "block";
        } else {
            table.style.display = "none";
        }
      });



      const editButton = document.getElementById('edit-breakdown-info');
      const editFormContainer = document.getElementById('edit-form-container');
      // const cancelButton = document.getElementById('cancel-breakdown-info');
    
      editButton.addEventListener('click', () => {
        editFormContainer.style.display = 'block';
      });
      
   
});

   
    
function cancel() {
    const form = document.getElementById("view_breakdown");
    form.style.display = "none";
  }